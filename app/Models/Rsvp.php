<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rsvp extends Model
{
    protected $fillable = ['guest_id', 'name', 'attendance_status', 'guest_count', 'message'];

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }
}

