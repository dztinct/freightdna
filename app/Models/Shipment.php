<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $fillable = [
        'tracking_number',
        'sender_name',
        'sender_phone',
        'sender_email',
        'receiver_name',
        'receiver_phone',
        'receiver_address',
        'item_description',
        'weight',
        'origin',
        'destination',
        'shipping_cost',
        'status',
    ];

    protected $casts = [
        'weight' => 'decimal:2',
        'shipping_cost' => 'decimal:2',
    ];

    // ---------------------------------------------
    // 🔹 Helpers
    // ---------------------------------------------

    public function getFormattedTrackingNumberAttribute()
    {
        return strtoupper($this->tracking_number);
    }

    public function getIsDeliveredAttribute()
    {
        return strtolower($this->status) === 'delivered';
    }

    // ---------------------------------------------
    // 🔹 Tracking Scope
    // ---------------------------------------------

    public function scopeTrack($query, $trackingNumber)
    {
        return $query->where('tracking_number', $trackingNumber)->first();
    }
}
