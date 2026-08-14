@extends('admin.layout')
@section('title','Dashboard')
@section('page-title','Dashboard')

@section('content')
<div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4 mb-8">
<div class="stat-card">
<p style="font-size:0.7rem;letter-spacing:0.15em;text-transform:uppercase;color:#888;margin-bottom:0.5rem;">Total Guests</p>
<p style="font-family:'Cormorant Garamond',Georgia,serif;font-size:2.5rem;font-weight:600;color:#2D4A3E;">{{ $totalGuests }}</p>
<p style="font-size:0.75rem;color:#888;">registered</p>
</div>
<div class="stat-card" style="border-left-color:#22c55e;">
<p style="font-size:0.7rem;letter-spacing:0.15em;text-transform:uppercase;color:#888;margin-bottom:0.5rem;">Hadir</p>
<p style="font-family:'Cormorant Garamond',Georgia,serif;font-size:2.5rem;font-weight:600;color:#22c55e;">{{ $totalHadir }}</p>
<p style="font-size:0.75rem;color:#888;">confirmed attendance</p>
</div>
<div class="stat-card" style="border-left-color:#ef4444;">
<p style="font-size:0.7rem;letter-spacing:0.15em;text-transform:uppercase;color:#888;margin-bottom:0.5rem;">Tidak Hadir</p>
<p style="font-family:'Cormorant Garamond',Georgia,serif;font-size:2.5rem;font-weight:600;color:#ef4444;">{{ $totalTidakHadir }}</p>
<p style="font-size:0.75rem;color:#888;">declined</p>
</div>
<div class="stat-card" style="border-left-color:#f59e0b;">
<p style="font-size:0.7rem;letter-spacing:0.15em;text-transform:uppercase;color:#888;margin-bottom:0.5rem;">Belum RSVP</p>
<p style="font-family:'Cormorant Garamond',Georgia,serif;font-size:2.5rem;font-weight:600;color:#f59e0b;">{{ $belumRsvp }}</p>
<p style="font-size:0.75rem;color:#888;">awaiting response</p>
</div>
<div class="stat-card" style="border-left-color:#6366f1;">
<p style="font-size:0.7rem;letter-spacing:0.15em;text-transform:uppercase;color:#888;margin-bottom:0.5rem;">Guestbook</p>
<p style="font-family:'Cormorant Garamond',Georgia,serif;font-size:2.5rem;font-weight:600;color:#6366f1;">{{ $totalGuestbook }}</p>
<p style="font-size:0.75rem;color:#888;">messages</p>
</div>
</div>

<div style="background:white;padding:1.5rem;box-shadow:0 1px 8px rgba(0,0,0,0.06);">
<h3 style="font-size:1rem;font-weight:600;color:#2D4A3E;margin-bottom:1.5rem;">Quick Actions</h3>
<div style="display:flex;gap:0.75rem;flex-wrap:wrap;">
<a href="{{ route('admin.guests.create') }}" class="btn-gold" style="font-size:0.8rem;padding:0.625rem 1.25rem;min-height:40px;">+ Add Guest</a>
<a href="{{ route('admin.gallery.index') }}" class="btn-forest" style="font-size:0.8rem;padding:0.625rem 1.25rem;min-height:40px;">Upload Photos</a>
<a href="{{ route('admin.settings.index') }}" class="btn-outline-gold" style="font-size:0.8rem;padding:0.625rem 1.25rem;min-height:40px;">Settings</a>
<a href="{{ route('invitation') }}" target="_blank" class="btn-outline-gold" style="font-size:0.8rem;padding:0.625rem 1.25rem;min-height:40px;">View Invitation</a>
</div>
</div>
@endsection
