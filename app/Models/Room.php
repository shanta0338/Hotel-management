<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'room_title',
        'description',
        'price',
        'room_type',
        'capacity',
        'wifi',
        'image',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'wifi' => 'boolean',
        'price' => 'decimal:2',
    ];

    /**
     * Default attribute values.
     *
     * @var array
     */
    protected $attributes = [
        'room_type' => 'standard',
        'capacity' => 2,
        'wifi' => true,
        'status' => 'available',
    ];

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
