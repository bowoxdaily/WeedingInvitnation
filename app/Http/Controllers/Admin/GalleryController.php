<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy('sort_order')->orderBy('id')->get();
        return view('admin.gallery.index', compact('galleries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'images'   => 'required|array|max:20',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $maxOrder = Gallery::max('sort_order') ?? 0;

        foreach ($request->file('images') as $i => $file) {
            $path = $file->store('gallery', 'public');
            Gallery::create([
                'image'      => '/storage/' . $path,
                'thumbnail'  => '/storage/' . $path,
                'sort_order' => $maxOrder + $i + 1,
            ]);
        }

        return redirect()->route('admin.gallery.index')->with('success', 'Photos uploaded.');
    }

    public function destroy(Gallery $gallery)
    {
        // Delete file
        $path = str_replace('/storage/', '', $gallery->image);
        Storage::disk('public')->delete($path);

        $gallery->delete();
        return back()->with('success', 'Photo deleted.');
    }

    public function reorder(Request $request)
    {
        $request->validate(['order' => 'required|array']);
        foreach ($request->order as $position => $id) {
            Gallery::where('id', $id)->update(['sort_order' => $position]);
        }
        return response()->json(['success' => true]);
    }
}

