<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Guest extends Model
{
    protected $fillable = ['name', 'phone', 'guest_limit', 'invitation_code'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($guest) {
            if (empty($guest->invitation_code)) {
                $guest->invitation_code = strtoupper(Str::random(8));
            }
        });
    }

    public function rsvp()
    {
        return $this->hasOne(Rsvp::class);
    }

    public function guestbooks()
    {
        return $this->hasMany(Guestbook::class);
    }

    public function getInvitationUrlAttribute()
    {
        return url('/') . '?to=' . urlencode($this->name);
    }
}

