@extends('admin.layout')
@section('title','Settings')
@section('page-title','Wedding Settings')
@section('content')
@if($errors->any())
<div style="background:#fef2f2;border-left:3px solid #ef4444;padding:0.75rem 1rem;margin-bottom:1.5rem;font-size:0.875rem;color:#991b1b;">
    <strong>Upload gagal.</strong>
    <ul style="margin:0.35rem 0 0 1rem;list-style:disc;">
        @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
    </ul>
</div>
@endif
<form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
@csrf

<div style="background:white;padding:1.5rem;margin-bottom:1.5rem;box-shadow:0 1px 8px rgba(0,0,0,0.06);">
<h3 style="font-size:1rem;font-weight:600;color:#2D4A3E;margin-bottom:1.5rem;border-bottom:1px solid #e5e5e5;padding-bottom:0.75rem;">Couple Information</h3>
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
<div>
<h4 style="font-size:0.8rem;color:#C9A84C;margin-bottom:1rem;">GROOM</h4>
<div style="margin-bottom:0.75rem;"><label class="form-label">Full Name</label><input type="text" name="groom_name" value="{{ $settings['groom_name'] ?? '' }}" class="form-input"></div>
<div style="margin-bottom:0.75rem;"><label class="form-label">Nickname</label><input type="text" name="groom_nickname" value="{{ $settings['groom_nickname'] ?? '' }}" class="form-input"></div>
<div style="margin-bottom:0.75rem;"><label class="form-label">Father</label><input type="text" name="groom_father" value="{{ $settings['groom_father'] ?? '' }}" class="form-input"></div>
<div style="margin-bottom:0.75rem;"><label class="form-label">Mother</label><input type="text" name="groom_mother" value="{{ $settings['groom_mother'] ?? '' }}" class="form-input"></div>
<div style="margin-bottom:0.75rem;"><label class="form-label">Instagram</label><input type="text" name="groom_instagram" value="{{ $settings['groom_instagram'] ?? '' }}" class="form-input"></div>
<div style="margin-bottom:0.75rem;">
    <label class="form-label">Foto Groom (Upload File)</label>
    @if(!empty($settings['groom_photo']))
        <div style="margin-bottom:0.5rem;display:flex;align-items:center;gap:0.75rem;">
            <img src="{{ asset($settings['groom_photo']) }}" alt="Groom Photo" style="width:60px;height:60px;object-fit:cover;border-radius:6px;border:1px solid #ddd;">
            <span style="font-size:0.75rem;color:#666;">Foto saat ini</span>
        </div>
    @endif
    <input type="file" name="groom_photo_file" accept="image/jpeg,image/png,image/webp" class="form-input" style="padding:0.4rem;">
    <small style="display:block;color:#888;margin-top:0.25rem;">Pilih foto baru untuk mengganti foto saat ini (maks. 10MB).</small>
    <input type="hidden" name="groom_photo" value="{{ $settings['groom_photo'] ?? '' }}">
</div>
</div>
<div>
<h4 style="font-size:0.8rem;color:#C9A84C;margin-bottom:1rem;">BRIDE</h4>
<div style="margin-bottom:0.75rem;"><label class="form-label">Full Name</label><input type="text" name="bride_name" value="{{ $settings['bride_name'] ?? '' }}" class="form-input"></div>
<div style="margin-bottom:0.75rem;"><label class="form-label">Nickname</label><input type="text" name="bride_nickname" value="{{ $settings['bride_nickname'] ?? '' }}" class="form-input"></div>
<div style="margin-bottom:0.75rem;"><label class="form-label">Father</label><input type="text" name="bride_father" value="{{ $settings['bride_father'] ?? '' }}" class="form-input"></div>
<div style="margin-bottom:0.75rem;"><label class="form-label">Mother</label><input type="text" name="bride_mother" value="{{ $settings['bride_mother'] ?? '' }}" class="form-input"></div>
<div style="margin-bottom:0.75rem;"><label class="form-label">Instagram</label><input type="text" name="bride_instagram" value="{{ $settings['bride_instagram'] ?? '' }}" class="form-input"></div>
<div style="margin-bottom:0.75rem;">
    <label class="form-label">Foto Bride (Upload File)</label>
    @if(!empty($settings['bride_photo']))
        <div style="margin-bottom:0.5rem;display:flex;align-items:center;gap:0.75rem;">
            <img src="{{ asset($settings['bride_photo']) }}" alt="Bride Photo" style="width:60px;height:60px;object-fit:cover;border-radius:6px;border:1px solid #ddd;">
            <span style="font-size:0.75rem;color:#666;">Foto saat ini</span>
        </div>
    @endif
    <input type="file" name="bride_photo_file" accept="image/jpeg,image/png,image/webp" class="form-input" style="padding:0.4rem;">
    <small style="display:block;color:#888;margin-top:0.25rem;">Pilih foto baru untuk mengganti foto saat ini (maks. 10MB).</small>
    <input type="hidden" name="bride_photo" value="{{ $settings['bride_photo'] ?? '' }}">
</div>
</div>
</div>
<div style="margin-top:1rem;padding-top:1rem;border-top:1px dashed #e5e5e5;">
    <label class="form-label" style="color:#2D4A3E;font-weight:600;">Nomor WhatsApp Pasangan (Penerima Konfirmasi RSVP)</label>
    <input type="text" name="whatsapp_number" value="{{ $settings['whatsapp_number'] ?? '628123456789' }}" class="form-input" placeholder="Contoh: 6281234567890">
    <span style="font-size:0.75rem;color:#777;display:block;margin-top:0.25rem;">Gunakan format 62... (tanpa + atau strip) untuk menerima konfirmasi pesan WhatsApp dari tamu.</span>
</div>
</div>

<div style="background:white;padding:1.5rem;margin-bottom:1.5rem;box-shadow:0 1px 8px rgba(0,0,0,0.06);">
<h3 style="font-size:1rem;font-weight:600;color:#2D4A3E;margin-bottom:1.5rem;border-bottom:1px solid #e5e5e5;padding-bottom:0.75rem;">Event Information</h3>
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
<div>
<h4 style="font-size:0.8rem;color:#C9A84C;margin-bottom:1rem;">AKAD NIKAH</h4>
<div style="margin-bottom:0.75rem;"><label class="form-label">Time</label><input type="text" name="akad_time" value="{{ $settings['akad_time'] ?? '' }}" class="form-input" placeholder="08.00 - 10.00 WIB"></div>
<div style="margin-bottom:0.75rem;"><label class="form-label">Venue</label><input type="text" name="akad_venue" value="{{ $settings['akad_venue'] ?? '' }}" class="form-input"></div>
<div style="margin-bottom:0.75rem;"><label class="form-label">Address</label><input type="text" name="akad_address" value="{{ $settings['akad_address'] ?? '' }}" class="form-input"></div>
<div><label class="form-label">Maps URL</label><input type="text" name="akad_maps_url" value="{{ $settings['akad_maps_url'] ?? '' }}" class="form-input"></div>
</div>
<div>
<h4 style="font-size:0.8rem;color:#C9A84C;margin-bottom:1rem;">RESEPSI</h4>
<div style="margin-bottom:0.75rem;"><label class="form-label">Time</label><input type="text" name="reception_time" value="{{ $settings['reception_time'] ?? '' }}" class="form-input" placeholder="11.00 - 14.00 WIB"></div>
<div style="margin-bottom:0.75rem;"><label class="form-label">Venue</label><input type="text" name="reception_venue" value="{{ $settings['reception_venue'] ?? '' }}" class="form-input"></div>
<div style="margin-bottom:0.75rem;"><label class="form-label">Address</label><input type="text" name="reception_address" value="{{ $settings['reception_address'] ?? '' }}" class="form-input"></div>
<div><label class="form-label">Maps URL</label><input type="text" name="reception_maps_url" value="{{ $settings['reception_maps_url'] ?? '' }}" class="form-input"></div>
</div>
</div>
<div style="margin-top:1rem;">
<label class="form-label">Google Maps Embed URL</label>
<input type="text" name="maps_embed_url" value="{{ $settings['maps_embed_url'] ?? '' }}" class="form-input" placeholder="https://www.google.com/maps/embed?...">
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-3">
<div><label class="form-label">Wedding Date (ID)</label><input type="text" name="wedding_date" value="{{ $settings['wedding_date'] ?? '' }}" class="form-input" placeholder="16 Agustus 2026"></div>
<div><label class="form-label">Wedding Date (EN)</label><input type="text" name="wedding_date_en" value="{{ $settings['wedding_date_en'] ?? '' }}" class="form-input" placeholder="16 August 2026"></div>
</div>
</div>

<div style="background:white;padding:1.5rem;margin-bottom:1.5rem;box-shadow:0 1px 8px rgba(0,0,0,0.06);">
<h3 style="font-size:1rem;font-weight:600;color:#2D4A3E;margin-bottom:1.5rem;border-bottom:1px solid #e5e5e5;padding-bottom:0.75rem;">Wedding Gift &amp; Bank Accounts</h3>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<div>
<h4 style="font-size:0.8rem;color:#C9A84C;margin-bottom:1rem;">BANK ACCOUNT 1</h4>
<div style="margin-bottom:0.75rem;"><label class="form-label">Bank</label><input type="text" name="bank1_name" value="{{ $settings['bank1_name'] ?? '' }}" class="form-input" placeholder="BCA"></div>
<div style="margin-bottom:0.75rem;"><label class="form-label">Number</label><input type="text" name="bank1_account_number" value="{{ $settings['bank1_account_number'] ?? '' }}" class="form-input" placeholder="1234567890"></div>
<div><label class="form-label">Name</label><input type="text" name="bank1_account_name" value="{{ $settings['bank1_account_name'] ?? '' }}" class="form-input" placeholder="Bowo"></div>
</div>
<div>
<h4 style="font-size:0.8rem;color:#C9A84C;margin-bottom:1rem;">BANK ACCOUNT 2</h4>
<div style="margin-bottom:0.75rem;"><label class="form-label">Bank</label><input type="text" name="bank2_name" value="{{ $settings['bank2_name'] ?? '' }}" class="form-input" placeholder="Mandiri"></div>
<div style="margin-bottom:0.75rem;"><label class="form-label">Number</label><input type="text" name="bank2_account_number" value="{{ $settings['bank2_account_number'] ?? '' }}" class="form-input" placeholder="0987654321"></div>
<div><label class="form-label">Name</label><input type="text" name="bank2_account_name" value="{{ $settings['bank2_account_name'] ?? '' }}" class="form-input" placeholder="Riska"></div>
</div>
</div>

<div style="margin-top:1.5rem;padding-top:1.25rem;border-top:1px dashed #e5e5e5;">
<h4 style="font-size:0.8rem;color:#C9A84C;margin-bottom:1rem;">QRIS PAYMENT (IMAGE UPLOAD)</h4>
<div style="max-width:500px;">
    @if(!empty($settings['qris_image']))
        <div style="margin-bottom:0.75rem;display:flex;align-items:center;gap:1rem;">
            <img src="{{ asset($settings['qris_image']) }}" alt="QRIS Code" style="width:100px;height:100px;object-fit:contain;border-radius:8px;border:1px solid #ddd;padding:4px;background:white;">
            <div>
                <span style="font-size:0.8rem;font-weight:600;color:#2D4A3E;display:block;">QRIS Aktif</span>
                <span style="font-size:0.75rem;color:#777;">Gambar barcode QRIS saat ini</span>
            </div>
        </div>
    @endif
    <label class="form-label">Upload Barcode QRIS (PNG / JPG / WEBP)</label>
    <input type="file" name="qris_image_file" accept="image/*" class="form-input" style="padding:0.4rem;">
    <input type="hidden" name="qris_image" value="{{ $settings['qris_image'] ?? '' }}">
</div>
</div>
</div>

<div style="background:white;padding:1.5rem;margin-bottom:1.5rem;box-shadow:0 1px 8px rgba(0,0,0,0.06);">
<h3 style="font-size:1rem;font-weight:600;color:#2D4A3E;margin-bottom:1.5rem;border-bottom:1px solid #e5e5e5;padding-bottom:0.75rem;">Other Settings</h3>
<div style="margin-bottom:0.75rem;"><label class="form-label">Wedding Quote</label><textarea name="wedding_quote" class="form-input" rows="2" style="resize:vertical;min-height:auto;">{{ $settings['wedding_quote'] ?? '' }}</textarea></div>
<div style="margin-bottom:0.75rem;"><label class="form-label">Quote Source</label><input type="text" name="wedding_quote_source" value="{{ $settings['wedding_quote_source'] ?? '' }}" class="form-input"></div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
<div>
    <label class="form-label">Hero Photo (Upload Latar Hero/Cover)</label>
    @if(!empty($settings['hero_photo']))
        <div style="margin-bottom:0.5rem;display:flex;align-items:center;gap:0.75rem;">
            <img src="{{ asset($settings['hero_photo']) }}" alt="Hero Photo" style="width:80px;height:50px;object-fit:cover;border-radius:6px;border:1px solid #ddd;">
            <span style="font-size:0.75rem;color:#666;">Foto saat ini</span>
        </div>
    @endif
    <input type="file" name="hero_photo_file" accept="image/*" class="form-input" style="padding:0.4rem;">
    <input type="hidden" name="hero_photo" value="{{ $settings['hero_photo'] ?? '' }}">
</div>

<div>
    <label class="form-label">Closing Photo (Upload Latar Penutup)</label>
    @if(!empty($settings['closing_photo']))
        <div style="margin-bottom:0.5rem;display:flex;align-items:center;gap:0.75rem;">
            <img src="{{ asset($settings['closing_photo']) }}" alt="Closing Photo" style="width:80px;height:50px;object-fit:cover;border-radius:6px;border:1px solid #ddd;">
            <span style="font-size:0.75rem;color:#666;">Foto saat ini</span>
        </div>
    @endif
    <input type="file" name="closing_photo_file" accept="image/*" class="form-input" style="padding:0.4rem;">
    <input type="hidden" name="closing_photo" value="{{ $settings['closing_photo'] ?? '' }}">
</div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
<div>
    <label class="form-label">Musik Pernikahan (Upload MP3 / Audio)</label>
    @if(!empty($settings['music_file']))
        <div style="margin-bottom:0.5rem;">
            <audio controls style="width:100%;height:36px;">
                <source src="{{ asset($settings['music_file']) }}">
            </audio>
        </div>
    @endif
    <input type="file" name="music_file_upload" accept="audio/*,.mp3,.m4a,.wav,.ogg" class="form-input" style="padding:0.4rem;">
    <input type="hidden" name="music_file" value="{{ $settings['music_file'] ?? '' }}">
</div>

<div>
    <label class="form-label">Judul Musik (Judul Lagu)</label>
    <input type="text" name="music_title" value="{{ $settings['music_title'] ?? '' }}" class="form-input" placeholder="A Thousand Years">
</div>
</div>
</div>

<div style="background:white;padding:1.5rem;margin-bottom:1.5rem;box-shadow:0 1px 8px rgba(0,0,0,0.06);">
<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1.5rem;border-bottom:1px solid #e5e5e5;padding-bottom:0.75rem;">
    <h3 style="font-size:1rem;font-weight:600;color:#2D4A3E;margin:0;">Love Story Timeline</h3>
    <button type="button" id="add-story-btn" style="background:#2D4A3E;color:white;border:none;padding:0.5rem 1rem;border-radius:4px;font-size:0.8rem;cursor:pointer;display:flex;align-items:center;gap:0.3rem;font-weight:500;">
        + Tambah Peristiwa
    </button>
</div>

<input type="hidden" name="love_story_present" value="1">

@php
    $loveStoryItems = [];
    if (!empty($settings['love_story'])) {
        $loveStoryItems = json_decode($settings['love_story'], true) ?? [];
    }
@endphp

<div id="love-story-container" style="display:flex;flex-direction:column;gap:1rem;">
    @forelse($loveStoryItems as $index => $story)
        <div class="story-row" style="background:#FAF9F6;border:1px solid #E5E5E0;border-radius:6px;padding:1rem;position:relative;">
            <div class="grid grid-cols-1 sm:grid-cols-[120px_1fr] gap-3 mb-3 pr-8">
                <div>
                    <label class="form-label" style="font-size:0.75rem;">Tahun</label>
                    <input type="text" name="love_story[{{ $index }}][year]" value="{{ $story['year'] ?? '' }}" class="form-input" placeholder="2021">
                </div>
                <div>
                    <label class="form-label" style="font-size:0.75rem;">Judul Peristiwa</label>
                    <input type="text" name="love_story[{{ $index }}][title]" value="{{ $story['title'] ?? '' }}" class="form-input" placeholder="Pertemuan Pertama">
                </div>
            </div>
            <div style="padding-right:2rem;">
                <label class="form-label" style="font-size:0.75rem;">Deskripsi</label>
                <textarea name="love_story[{{ $index }}][description]" class="form-input" rows="2" style="resize:vertical;min-height:auto;" placeholder="Ceritakan momen membahagiakan ini...">{{ $story['description'] ?? '' }}</textarea>
            </div>
            <button type="button" class="remove-story-btn" style="position:absolute;top:0.75rem;right:0.75rem;background:#ef4444;color:white;border:none;width:26px;height:26px;border-radius:50%;cursor:pointer;font-size:0.8rem;line-height:1;display:flex;align-items:center;justify-content:center;" title="Hapus Peristiwa">
                &#10005;
            </button>
        </div>
    @empty
        <div id="empty-story-notice" style="text-align:center;padding:1.5rem;color:#888;font-size:0.85rem;border:1px dashed #ccc;border-radius:6px;">
            Belum ada poin cerita Love Story. Klik tombol <strong>"+ Tambah Peristiwa"</strong> di atas untuk menambahkan.
        </div>
    @endforelse
</div>
</div>

<button type="submit" class="btn-gold" style="font-size:0.9rem;padding:1rem 2.5rem;">Save All Settings</button>
</form>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const container = document.getElementById('love-story-container');
    const addBtn = document.getElementById('add-story-btn');
    let storyIndex = {{ count($loveStoryItems ?? []) }};

    if (addBtn && container) {
        addBtn.addEventListener('click', function() {
            const emptyNotice = document.getElementById('empty-story-notice');
            if (emptyNotice) {
                emptyNotice.remove();
            }

            const row = document.createElement('div');
            row.className = 'story-row';
            row.style.cssText = 'background:#FAF9F6;border:1px solid #E5E5E0;border-radius:6px;padding:1rem;position:relative;';
            row.innerHTML = `
                <div class="grid grid-cols-1 sm:grid-cols-[120px_1fr] gap-3 mb-3 pr-8">
                    <div>
                        <label class="form-label" style="font-size:0.75rem;">Tahun</label>
                        <input type="text" name="love_story[${storyIndex}][year]" class="form-input" placeholder="2021">
                    </div>
                    <div>
                        <label class="form-label" style="font-size:0.75rem;">Judul Peristiwa</label>
                        <input type="text" name="love_story[${storyIndex}][title]" class="form-input" placeholder="Pertemuan Pertama">
                    </div>
                </div>
                <div style="padding-right:2rem;">
                    <label class="form-label" style="font-size:0.75rem;">Deskripsi</label>
                    <textarea name="love_story[${storyIndex}][description]" class="form-input" rows="2" style="resize:vertical;min-height:auto;" placeholder="Ceritakan momen membahagiakan ini..."></textarea>
                </div>
                <button type="button" class="remove-story-btn" style="position:absolute;top:0.75rem;right:0.75rem;background:#ef4444;color:white;border:none;width:26px;height:26px;border-radius:50%;cursor:pointer;font-size:0.8rem;line-height:1;display:flex;align-items:center;justify-content:center;" title="Hapus Peristiwa">
                    &#10005;
                </button>
            `;
            container.appendChild(row);
            storyIndex++;
        });

        container.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-story-btn') || e.target.closest('.remove-story-btn')) {
                const button = e.target.classList.contains('remove-story-btn') ? e.target : e.target.closest('.remove-story-btn');
                const row = button.closest('.story-row');
                if (row) {
                    row.remove();
                    if (container.querySelectorAll('.story-row').length === 0) {
                        container.innerHTML = `
                            <div id="empty-story-notice" style="text-align:center;padding:1.5rem;color:#888;font-size:0.85rem;border:1px dashed #ccc;border-radius:6px;">
                                Belum ada poin cerita Love Story. Klik tombol <strong>"+ Tambah Peristiwa"</strong> di atas untuk menambahkan.
                            </div>
                        `;
                    }
                }
            }
        });
    }
});
</script>

@endsection

