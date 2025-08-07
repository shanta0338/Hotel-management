<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email', 
        'phone',
        'subject',
        'message',
        'user_id',
        'status',
        'replied_at'
    ];

    protected $casts = [
        'replied_at' => 'datetime',
    ];

    // Relationship with User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Scope for new messages
    public function scopeNew($query)
    {
        return $query->where('status', 'new');
    }

    // Scope for read messages
    public function scopeRead($query)
    {
        return $query->where('status', 'read');
    }

    // Scope for replied messages
    public function scopeReplied($query)
    {
        return $query->where('status', 'replied');
    }

    // Check if message is new
    public function isNew()
    {
        return $this->status === 'new';
    }

    // Mark as read
    public function markAsRead()
    {
        $this->update(['status' => 'read']);
    }

    // Mark as replied
    public function markAsReplied()
    {
        $this->update([
            'status' => 'replied',
            'replied_at' => now()
        ]);
    }
}
