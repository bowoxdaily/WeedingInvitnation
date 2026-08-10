<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guestbook;
use Illuminate\Http\Request;

class GuestbookController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search', '');
        $guestbooks = Guestbook::when($search, fn($q) => $q->where('name', 'like', "%{$search}%"))
            ->latest()
            ->paginate(20);

        return view('admin.guestbooks.index', compact('guestbooks', 'search'));
    }

    public function toggleStatus(Guestbook $guestbook)
    {
        $guestbook->update(['status' => $guestbook->status === 'visible' ? 'hidden' : 'visible']);
        return back()->with('success', 'Status updated.');
    }

    public function destroy(Guestbook $guestbook)
    {
        $guestbook->delete();
        return back()->with('success', 'Message deleted.');
    }
}

