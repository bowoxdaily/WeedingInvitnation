<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Guestbook;
use App\Models\Setting;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function index(Request $request)
    {
        $rawGuest = $request->query('to', '');
        $rawGuest = trim(strip_tags(htmlspecialchars($rawGuest, ENT_QUOTES, 'UTF-8')));
        $guestName = !empty($rawGuest) ? $rawGuest : 'Tamu Undangan';

        $settings   = Setting::getAll();
        $galleries  = Gallery::orderBy('sort_order')->orderBy('id')->get();
        $guestbooks = Guestbook::visible()->latest()->take(20)->get();

        $loveStory = [];
        if (!empty($settings['love_story'])) {
            $loveStory = json_decode($settings['love_story'], true) ?? [];
        }

        return view('wedding.index', compact('guestName', 'settings', 'galleries', 'guestbooks', 'loveStory'));
    }
}


