<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rsvp;
use Illuminate\Http\Request;

class RsvpController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search', '');
        $filter = $request->query('filter', '');

        $rsvps = Rsvp::with('guest')
            ->when($search, fn($q) => $q->where('name', 'like', "%{$search}%"))
            ->when($filter, fn($q) => $q->where('attendance_status', $filter))
            ->latest()
            ->paginate(20);

        return view('admin.rsvps.index', compact('rsvps', 'search', 'filter'));
    }

    public function destroy(Rsvp $rsvp)
    {
        $rsvp->delete();
        return back()->with('success', 'RSVP deleted.');
    }
}

