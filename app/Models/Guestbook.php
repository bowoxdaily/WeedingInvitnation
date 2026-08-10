<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guestbook extends Model
{
    protected $fillable = ['guest_id', 'name', 'message', 'status'];

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }

    public function scopeVisible($query)
    {
        return $query->where('status', 'visible');
    }
}

