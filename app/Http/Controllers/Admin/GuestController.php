<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GuestController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search', '');
        $guests = Guest::when($search, fn($q) => $q->where('name', 'like', "%{$search}%"))
            ->withCount(['rsvp'])
            ->latest()
            ->paginate(20);

        return view('admin.guests.index', compact('guests', 'search'));
    }

    public function create()
    {
        return view('admin.guests.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:100',
            'phone'       => 'nullable|string|max:20',
            'guest_limit' => 'required|integer|min:1|max:10',
        ]);

        Guest::create($validated);
        return redirect()->route('admin.guests.index')->with('success', 'Guest added successfully.');
    }

    public function edit(Guest $guest)
    {
        return view('admin.guests.edit', compact('guest'));
    }

    public function update(Request $request, Guest $guest)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:100',
            'phone'       => 'nullable|string|max:20',
            'guest_limit' => 'required|integer|min:1|max:10',
        ]);

        $guest->update($validated);
        return redirect()->route('admin.guests.index')->with('success', 'Guest updated successfully.');
    }

    public function destroy(Guest $guest)
    {
        $guest->delete();
        return redirect()->route('admin.guests.index')->with('success', 'Guest deleted.');
    }
}

