@extends('admin.layout')
@section('title','Settings')
@section('page-title','Wedding Settings')
@section('content')
<form method="POST" action="{{ route('admin.settings.update') }}">
@csrf

<div style="background:white;padding:1.5rem;margin-bottom:1.5rem;box-shadow:0 1px 8px rgba(0,0,0,0.06);">
<h3 style="font-size:1rem;font-weight:600;color:#2D4A3E;margin-bottom:1.5rem;border-bottom:1px solid #e5e5e5;padding-bottom:0.75rem;">Couple Information</h3>
<div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
<div>
<h4 style="font-size:0.8rem;color:#C9A84C;margin-bottom:1rem;">GROOM</h4>
<div style="margin-bottom:0.75rem;"><label class="form-label">Full Name</label><input type="text" name="groom_name" value="{{ $settings['groom_name'] ?? '' }}" class="form-input"></div>
<div style="margin-bottom:0.75rem;"><label class="form-label">Nickname</label><input type="text" name="groom_nickname" value="{{ $settings['groom_nickname'] ?? '' }}" class="form-input"></div>
<div style="margin-bottom:0.75rem;"><label class="form-label">Father</label><input type="text" name="groom_father" value="{{ $settings['groom_father'] ?? '' }}" class="form-input"></div>
<div style="margin-bottom:0.75rem;"><label class="form-label">Mother</label><input type="text" name="groom_mother" value="{{ $settings['groom_mother'] ?? '' }}" class="form-input"></div>
<div style="margin-bottom:0.75rem;"><label class="form-label">Instagram</label><input type="text" name="groom_instagram" value="{{ $settings['groom_instagram'] ?? '' }}" class="form-input"></div>
<div><label class="form-label">Photo URL</label><input type="text" name="groom_photo" value="{{ $settings['groom_photo'] ?? '' }}" class="form-input"></div>
</div>
<div>
<h4 style="font-size:0.8rem;color:#C9A84C;margin-bottom:1rem;">BRIDE</h4>
<div style="margin-bottom:0.75rem;"><label class="form-label">Full Name</label><input type="text" name="bride_name" value="{{ $settings['bride_name'] ?? '' }}" class="form-input"></div>
<div style="margin-bottom:0.75rem;"><label class="form-label">Nickname</label><input type="text" name="bride_nickname" value="{{ $settings['bride_nickname'] ?? '' }}" class="form-input"></div>
<div style="margin-bottom:0.75rem;"><label class="form-label">Father</label><input type="text" name="bride_father" value="{{ $settings['bride_father'] ?? '' }}" class="form-input"></div>
<div style="margin-bottom:0.75rem;"><label class="form-label">Mother</label><input type="text" name="bride_mother" value="{{ $settings['bride_mother'] ?? '' }}" class="form-input"></div>
<div style="margin-bottom:0.75rem;"><label class="form-label">Instagram</label><input type="text" name="bride_instagram" value="{{ $settings['bride_instagram'] ?? '' }}" class="form-input"></div>
<div><label class="form-label">Photo URL</label><input type="text" name="bride_photo" value="{{ $settings['bride_photo'] ?? '' }}" class="form-input"></div>
</div>
</div>
</div>

<div style="background:white;padding:1.5rem;margin-bottom:1.5rem;box-shadow:0 1px 8px rgba(0,0,0,0.06);">
<h3 style="font-size:1rem;font-weight:600;color:#2D4A3E;margin-bottom:1.5rem;border-bottom:1px solid #e5e5e5;padding-bottom:0.75rem;">Event Information</h3>
<div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
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
<div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;margin-top:0.75rem;">
<div><label class="form-label">Wedding Date (ID)</label><input type="text" name="wedding_date" value="{{ $settings['wedding_date'] ?? '' }}" class="form-input" placeholder="16 Agustus 2026"></div>
<div><label class="form-label">Wedding Date (EN)</label><input type="text" name="wedding_date_en" value="{{ $settings['wedding_date_en'] ?? '' }}" class="form-input" placeholder="16 August 2026"></div>
</div>
</div>

<div style="background:white;padding:1.5rem;margin-bottom:1.5rem;box-shadow:0 1px 8px rgba(0,0,0,0.06);">
<h3 style="font-size:1rem;font-weight:600;color:#2D4A3E;margin-bottom:1.5rem;border-bottom:1px solid #e5e5e5;padding-bottom:0.75rem;">Bank Accounts</h3>
<div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
<div>
<h4 style="font-size:0.8rem;color:#C9A84C;margin-bottom:1rem;">ACCOUNT 1</h4>
<div style="margin-bottom:0.75rem;"><label class="form-label">Bank</label><input type="text" name="bank1_name" value="{{ $settings['bank1_name'] ?? '' }}" class="form-input"></div>
<div style="margin-bottom:0.75rem;"><label class="form-label">Number</label><input type="text" name="bank1_account_number" value="{{ $settings['bank1_account_number'] ?? '' }}" class="form-input"></div>
<div><label class="form-label">Name</label><input type="text" name="bank1_account_name" value="{{ $settings['bank1_account_name'] ?? '' }}" class="form-input"></div>
</div>
<div>
<h4 style="font-size:0.8rem;color:#C9A84C;margin-bottom:1rem;">ACCOUNT 2</h4>
<div style="margin-bottom:0.75rem;"><label class="form-label">Bank</label><input type="text" name="bank2_name" value="{{ $settings['bank2_name'] ?? '' }}" class="form-input"></div>
<div style="margin-bottom:0.75rem;"><label class="form-label">Number</label><input type="text" name="bank2_account_number" value="{{ $settings['bank2_account_number'] ?? '' }}" class="form-input"></div>
<div><label class="form-label">Name</label><input type="text" name="bank2_account_name" value="{{ $settings['bank2_account_name'] ?? '' }}" class="form-input"></div>
</div>
</div>
</div>

<div style="background:white;padding:1.5rem;margin-bottom:1.5rem;box-shadow:0 1px 8px rgba(0,0,0,0.06);">
<h3 style="font-size:1rem;font-weight:600;color:#2D4A3E;margin-bottom:1.5rem;border-bottom:1px solid #e5e5e5;padding-bottom:0.75rem;">Other Settings</h3>
<div style="margin-bottom:0.75rem;"><label class="form-label">Wedding Quote</label><textarea name="wedding_quote" class="form-input" rows="2" style="resize:vertical;min-height:auto;">{{ $settings['wedding_quote'] ?? '' }}</textarea></div>
<div style="margin-bottom:0.75rem;"><label class="form-label">Quote Source</label><input type="text" name="wedding_quote_source" value="{{ $settings['wedding_quote_source'] ?? '' }}" class="form-input"></div>
<div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;margin-top:0.5rem;">
<div><label class="form-label">Hero Photo URL</label><input type="text" name="hero_photo" value="{{ $settings['hero_photo'] ?? '' }}" class="form-input"></div>
<div><label class="form-label">Closing Photo URL</label><input type="text" name="closing_photo" value="{{ $settings['closing_photo'] ?? '' }}" class="form-input"></div>
<div><label class="form-label">Music File URL</label><input type="text" name="music_file" value="{{ $settings['music_file'] ?? '' }}" class="form-input" placeholder="/music/wedding-song.mp3"></div>
<div><label class="form-label">Music Title</label><input type="text" name="music_title" value="{{ $settings['music_title'] ?? '' }}" class="form-input"></div>
</div>
</div>

<button type="submit" class="btn-gold" style="font-size:0.9rem;padding:1rem 2.5rem;">Save All Settings</button>
</form>

@endsection

