@extends('admin.layout')
@section('title','Guests')
@section('page-title','Guest List')

@section('content')
<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1.5rem;flex-wrap:wrap;gap:0.75rem;">
<form method="GET" style="display:flex;gap:0.5rem;">
<input type="text" name="search" value="{{ $search }}" placeholder="Search guests..." style="padding:0.5rem 0.75rem;border:1px solid #ddd;font-size:0.875rem;outline:none;min-height:40px;">
<button type="submit" class="btn-forest" style="font-size:0.8rem;padding:0.5rem 1rem;min-height:40px;">Search</button>
@if($search)<a href="{{ route('admin.guests.index') }}" class="btn-outline-gold" style="font-size:0.8rem;padding:0.5rem 1rem;min-height:40px;">Clear</a>@endif
</form>
<a href="{{ route('admin.guests.create') }}" class="btn-gold" style="font-size:0.8rem;padding:0.5rem 1.25rem;min-height:40px;">+ Add Guest</a>
</div>

<div style="background:white;box-shadow:0 1px 8px rgba(0,0,0,0.06);overflow:auto;">
<table style="width:100%;border-collapse:collapse;font-size:0.875rem;">
<thead>
<tr style="background:#F5F5F0;border-bottom:2px solid #e5e5e5;">
<th style="padding:0.75rem 1rem;text-align:left;font-weight:600;color:#2D4A3E;">#</th>
<th style="padding:0.75rem 1rem;text-align:left;font-weight:600;color:#2D4A3E;">Name</th>
<th style="padding:0.75rem 1rem;text-align:left;font-weight:600;color:#2D4A3E;">Phone</th>
<th style="padding:0.75rem 1rem;text-align:left;font-weight:600;color:#2D4A3E;">Limit</th>
<th style="padding:0.75rem 1rem;text-align:left;font-weight:600;color:#2D4A3E;">RSVP</th>
<th style="padding:0.75rem 1rem;text-align:left;font-weight:600;color:#2D4A3E;">Actions</th>
</tr>
</thead>
<tbody>
@forelse($guests as $i => $guest)
<tr style="border-bottom:1px solid #f0f0f0;{{ $i % 2 === 0 ? '' : 'background:#fafafa;' }}">
<td style="padding:0.75rem 1rem;color:#999;">{{ $guest->id }}</td>
<td style="padding:0.75rem 1rem;font-weight:500;">{{ $guest->name }}</td>
<td style="padding:0.75rem 1rem;color:#666;">{{ $guest->phone ?? '-' }}</td>
<td style="padding:0.75rem 1rem;">{{ $guest->guest_limit }}</td>
<td style="padding:0.75rem 1rem;">
@if($guest->rsvp_count > 0)
<span style="background:#f0fdf4;color:#166534;font-size:0.7rem;padding:0.2rem 0.6rem;border-radius:9999px;">Done</span>
@else
<span style="background:#fef3c7;color:#92400e;font-size:0.7rem;padding:0.2rem 0.6rem;border-radius:9999px;">Pending</span>
@endif
</td>
<td style="padding:0.75rem 1rem;">
<div style="display:flex;gap:0.4rem;flex-wrap:wrap;">
<button onclick="navigator.clipboard.writeText('{{ url('/?to=' . urlencode($guest->name)) }}');alert('Link copied for {{ addslashes($guest->name) }}!');" style="font-size:0.75rem;color:#C9A84C;background:none;border:1px solid #C9A84C;cursor:pointer;padding:0.25rem 0.5rem;border-radius:3px;">Copy Link</button>
@if($guest->phone)
@php
$waMsg = urlencode("Kepada Yth. " . $guest->name . ",\n\nTanpa mengurangi rasa hormat, kami mengundang Bapak/Ibu/Saudara/i untuk menghadiri acara pernikahan kami:\n\n" . url('/?to=' . urlencode($guest->name)));
$waPhone = preg_replace('/[^0-9]/', '', $guest->phone);
if (str_starts_with($waPhone, '0')) { $waPhone = '62' . substr($waPhone, 1); }
@endphp
<a href="https://wa.me/{{ $waPhone }}?text={{ $waMsg }}" target="_blank" style="font-size:0.75rem;color:#166534;background:#f0fdf4;border:1px solid #22c55e;text-decoration:none;padding:0.25rem 0.5rem;border-radius:3px;">WA Share</a>
@endif
<a href="{{ route('admin.guests.edit',$guest) }}" style="font-size:0.75rem;color:#2D4A3E;text-decoration:none;padding:0.25rem 0.5rem;border:1px solid #2D4A3E;border-radius:3px;">Edit</a>
<form method="POST" action="{{ route('admin.guests.destroy',$guest) }}" onsubmit="return confirm('Delete this guest?')" style="display:inline;">
@csrf @method('DELETE')
<button type="submit" style="font-size:0.75rem;color:#ef4444;background:none;border:1px solid #ef4444;cursor:pointer;padding:0.25rem 0.5rem;border-radius:3px;">Delete</button>
</form>
</div>
</td>
</tr>
@empty
<tr><td colspan="6" style="padding:2rem;text-align:center;color:#888;font-style:italic;">No guests found.</td></tr>
@endforelse
</tbody>
</table>
</div>
<div style="margin-top:1rem;">{{ $guests->links() }}</div>
@endsection
