<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_title',
        'description',
        'image',
        'price',
        'wifi',
        'room_type'
    ];
}
