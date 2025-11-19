<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrackingEvent extends Model
{
    protected $fillable = ['shipment_id','code','location','notes','user_id','happened_at'];

    protected $casts = ['happened_at' => 'datetime'];

    public function shipment(){ return $this->belongsTo(Shipment::class); }
    public function user(){ return $this->belongsTo(User::class); }
}
