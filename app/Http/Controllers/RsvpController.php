<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Rsvp;
use Illuminate\Http\Request;

class RsvpController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'              => 'required|string|max:100',
            'attendance_status' => 'required|in:hadir,tidak_hadir,belum_pasti',
            'guest_count'       => 'required|integer|min:1|max:10',
            'message'           => 'nullable|string|max:500',
        ]);

        // Find guest by name (optional)
        $guest = Guest::where('name', $validated['name'])->first();

        Rsvp::updateOrCreate(
            ['guest_id' => $guest?->id, 'name' => $validated['name']],
            [
                'attendance_status' => $validated['attendance_status'],
                'guest_count'       => $validated['guest_count'],
                'message'           => $validated['message'] ?? null,
            ]
        );

        return response()->json(['success' => true, 'message' => 'RSVP berhasil disimpan.']);
    }
}

