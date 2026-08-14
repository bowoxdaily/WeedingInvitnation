<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::getAll();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'groom_photo_file'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'bride_photo_file'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'hero_photo_file'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'closing_photo_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'qris_image_file'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'music_file_upload'  => 'nullable|file|mimes:mp3,wav,m4a,ogg,audio/mpeg,audio/mp3,mpga|max:20480',
            'love_story'         => 'nullable|array',
            'love_story.*.year'  => 'nullable|string|max:50',
            'love_story.*.title' => 'nullable|string|max:255',
            'love_story.*.description' => 'nullable|string',
        ]);

        $fileFields = [
            'groom_photo_file'   => 'groom_photo',
            'bride_photo_file'   => 'bride_photo',
            'hero_photo_file'    => 'hero_photo',
            'closing_photo_file' => 'closing_photo',
            'qris_image_file'    => 'qris_image',
        ];

        $data = $request->except([
            '_token', '_method',
            'groom_photo_file', 'bride_photo_file', 'hero_photo_file', 'closing_photo_file', 'qris_image_file', 'music_file_upload',
            'love_story_present'
        ]);

        // Handle dynamic love_story repeater serialization
        if ($request->has('love_story_present')) {
            $rawLoveStory = $request->input('love_story', []);
            $filteredLoveStory = [];
            if (is_array($rawLoveStory)) {
                foreach ($rawLoveStory as $item) {
                    if (!is_array($item)) continue;
                    $year = trim($item['year'] ?? '');
                    $title = trim($item['title'] ?? '');
                    $desc = trim($item['description'] ?? '');
                    if ($year !== '' || $title !== '' || $desc !== '') {
                        $filteredLoveStory[] = [
                            'year'        => $year,
                            'title'       => $title,
                            'description' => $desc,
                        ];
                    }
                }
            }
            Setting::set('love_story', json_encode(array_values($filteredLoveStory)));
            unset($data['love_story']);
        }

        // Unset hidden field values if a new file is uploaded for that setting
        foreach ($fileFields as $fileKey => $settingKey) {
            if ($request->hasFile($fileKey)) {
                unset($data[$settingKey]);
            }
        }
        if ($request->hasFile('music_file_upload')) {
            unset($data['music_file']);
        }

        // Save all text inputs
        foreach ($data as $key => $value) {
            Setting::set($key, $value);
        }

        // Upload and save new files
        foreach ($fileFields as $fileKey => $settingKey) {
            if ($request->hasFile($fileKey) && $request->file($fileKey)->isValid()) {
                $oldValue = Setting::get($settingKey);
                $path = $request->file($fileKey)->store('photos', 'public');
                Setting::set($settingKey, '/storage/' . $path);
                $this->deleteStoredFile($oldValue);
            }
        }

        if ($request->hasFile('music_file_upload') && $request->file('music_file_upload')->isValid()) {
            $oldMusic = Setting::get('music_file');
            $path = $request->file('music_file_upload')->store('music', 'public');
            Setting::set('music_file', '/storage/' . $path);
            $this->deleteStoredFile($oldMusic);
        }

        // Clear all setting cache
        Cache::flush();

        return redirect()->route('admin.settings.index')->with('success', 'Settings & files uploaded successfully.');
    }

    private function deleteStoredFile(?string $url): void
    {
        if (!$url || !str_starts_with($url, '/storage/')) {
            return;
        }

        Storage::disk('public')->delete(substr($url, strlen('/storage/')));
    }
}




