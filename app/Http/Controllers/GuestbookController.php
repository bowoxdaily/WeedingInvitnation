<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Guestbook;
use Illuminate\Http\Request;

class GuestbookController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:100',
            'message' => 'required|string|max:500',
        ]);

        $guest = Guest::where('name', $validated['name'])->first();

        $entry = Guestbook::create([
            'guest_id' => $guest?->id,
            'name'     => strip_tags($validated['name']),
            'message'  => strip_tags($validated['message']),
            'status'   => 'visible',
        ]);

        return response()->json([
            'success' => true,
            'entry'   => [
                'name'    => $entry->name,
                'message' => $entry->message,
            ],
        ]);
    }
}

