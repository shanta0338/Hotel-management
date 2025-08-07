<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    protected $fillable = [
        'room_id',
        'guest_name',
        'email',
        'phone',
        'check_in',
        'check_out',
        'special_requests',
        'total_price',
        'nights',
        'status'
    ];

    protected $casts = [
        'check_in' => 'date',
        'check_out' => 'date',
        'total_price' => 'decimal:2'
    ];

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
