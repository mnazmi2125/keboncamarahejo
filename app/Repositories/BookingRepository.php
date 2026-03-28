<?php

namespace App\Repositories;

use App\Models\BookingTransaction;
use App\Repositories\Contracts\BookingRepositoryInterface;

class BookingRepository implements BookingRepositoryInterface
{
    public function createBooking(array $data)
    {
        return BookingTransaction::create($data);
    }

    // public function findByTrxIdAndPhoneNumber($bookingTrxId, $phoneNumber)
    // {
    //     return BookingTransaction::where('booking_trx_id', $bookingTrxId)
    //         ->where('phone_number', $phoneNumber)
    //         ->first();
    // }

        public function findByTrxIdAndPhoneNumber($bookingTrxId, $phoneNumber)
    {
        return BookingTransaction::with([
            'ticket',
            'ticket.category',
            'ticket.seller'
        ])
        ->where('booking_trx_id', $bookingTrxId)
        ->where('phone_number', $phoneNumber)
        ->first();
    }

}
