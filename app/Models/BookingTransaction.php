<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingTransaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'booking_trx_id',
        'phone_number',
        'email',
        'proof',
        'total_amount',
        'total_participant',
        'extra_service',
        'extra_service_price',
        'extra_services_data', // ✅ NEW: JSON column
        'is_paid',
        'started_at',
        'ticket_id',
    ];

    protected $casts = [
        'started_at' => 'date',
        'extra_services_data' => 'array', // ✅ Cast JSON to array
    ];

    public static function generateUniqueTrxId()
    {
        $prefix = 'JRT';
        do {
            $randomString = $prefix . mt_rand(1000, 9999);
        } while (self::where('booking_trx_id', $randomString)->exists());
        return $randomString;
    }

    public function ticket(): BelongsTo
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }

    /**
     * Get formatted extra services for display
     */
    public function getExtraServicesListAttribute()
    {
        if (empty($this->extra_services_data)) {
            return [];
        }

        return collect($this->extra_services_data)->map(function ($service) {
            return [
                'name' => $service['name'],
                'quantity' => $service['quantity'],
                'price' => $service['price'],
                'subtotal' => $service['price'] * $service['quantity'],
            ];
        });
    }
}