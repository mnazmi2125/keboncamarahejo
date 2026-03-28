<?php

namespace App\Services;

use App\Jobs\SendBookingConfirmedEmail;
use App\Models\BookingTransaction;
use App\Repositories\Contracts\BookingRepositoryInterface;
use App\Repositories\Contracts\TicketRepositoryInterface;
use Illuminate\Support\Facades\DB;

class BookingService
{

    protected $ticketRepository;
    protected $bookingRepository;

    public function __construct(TicketRepositoryInterface $ticketRepository, BookingRepositoryInterface $bookingRepository)
    {
        $this->ticketRepository = $ticketRepository;
        $this->bookingRepository = $bookingRepository;
    }

   public function getBookingDetails(array $validated)
{
    $bookingDetails = $this->bookingRepository->findByTrxIdAndPhoneNumber(
        $validated['booking_trx_id'],
        $validated['phone_number']
    );

    // ✅ TIDAK PERLU eager load relasi karena sudah ada di JSON!
    // Data extra services sudah di-cast otomatis ke array
    
    return $bookingDetails;
}

    public function calculateTotals($ticketId, $totalParticipant, $extraServicePrice = 0)
    {
        $ppn = 0;
        $price = $this->ticketRepository->getPrice($ticketId);

        $subTotal = ($totalParticipant * $price) + $extraServicePrice;
        $totalPpn = $ppn * $subTotal;
        $totalAmount = $subTotal + $totalPpn;

        return [
            'sub_total' => $subTotal,
            'total_ppn' => $totalPpn,
            'total_amount' => $totalAmount,
        ];
    }

    public function storeBookingInSession($ticket, $validateData, $totals)
    {
        // ✅ Process extra services array
        $extraServicesData = [];
        if (isset($validateData['extra_services']) && is_array($validateData['extra_services'])) {
            foreach ($validateData['extra_services'] as $service) {
                if (isset($service['quantity']) && $service['quantity'] > 0) {
                    $extraServicesData[] = [
                        'slug' => $service['slug'],
                        'name' => $service['name'],
                        'price' => $service['price'],
                        'quantity' => $service['quantity'],
                        'subtotal' => $service['price'] * $service['quantity'],
                    ];
                }
            }
        }

        session()->put('booking', [
            'ticket_id' => $ticket->id,
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'phone_number' => $validateData['phone_number'],
            'started_at' => $validateData['started_at'],
            'total_participant' => $validateData['total_participant'],
            'extra_services' => $extraServicesData, // ✅ Array of services
            'extra_service_price' => $validateData['extra_service_price'] ?? 0,
            'sub_total' => $totals['sub_total'],
            'total_ppn' => $totals['total_ppn'],
            'total_amount' => $totals['total_amount'],
        ]);
    }

    public function payment()
    {
        $booking = session('booking');
        $ticket = $this->ticketRepository->find($booking['ticket_id']);

        return compact('booking', 'ticket');
    }

    public function paymentStore(array $validated)
    {
        $booking = session('booking');
        $bookingTransactionId = null;

        DB::transaction(function () use ($validated, &$bookingTransactionId, $booking) {

            if (isset($validated['proof'])) {
                $proofPath = $validated['proof']->store('proofs', 'public');
                $validated['proof'] = $proofPath;
            }

            $validated['name'] = $booking['name'];
            $validated['email'] = $booking['email'];
            $validated['phone_number'] = $booking['phone_number'];
            $validated['total_participant'] = $booking['total_participant'];
            
            // ✅ Store extra services as JSON
            $validated['extra_services_data'] = json_encode($booking['extra_services'] ?? []);
            $validated['extra_service_price'] = $booking['extra_service_price'] ?? 0;
            
            // For backward compatibility - store first item or summary
            if (!empty($booking['extra_services'])) {
                $serviceNames = array_column($booking['extra_services'], 'name');
                $validated['extra_service'] = implode(', ', $serviceNames);
            } else {
                $validated['extra_service'] = null;
            }
            
            $validated['started_at'] = $booking['started_at'];
            $validated['total_amount'] = $booking['total_amount'];
            $validated['ticket_id'] = $booking['ticket_id'];
            $validated['is_paid'] = false;
            $validated['booking_trx_id'] = BookingTransaction::generateUniqueTrxId();

            $newBooking = $this->bookingRepository->createBooking($validated);
            $bookingTransactionId = $newBooking->id;

            SendBookingConfirmedEmail::dispatch($newBooking);

        });

        return $bookingTransactionId;
    }
}