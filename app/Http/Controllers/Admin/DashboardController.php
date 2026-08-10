<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use App\Models\Guestbook;
use App\Models\Rsvp;

class DashboardController extends Controller
{
    public function index()
    {
        $totalGuests    = Guest::count();
        $totalHadir     = Rsvp::where('attendance_status', 'hadir')->count();
        $totalTidakHadir = Rsvp::where('attendance_status', 'tidak_hadir')->count();
        $totalRsvp      = Rsvp::count();
        $belumRsvp      = max(0, $totalGuests - $totalRsvp);
        $totalGuestbook = Guestbook::count();

        return view('admin.dashboard', compact(
            'totalGuests',
            'totalHadir',
            'totalTidakHadir',
            'belumRsvp',
            'totalGuestbook'
        ));
    }
}

