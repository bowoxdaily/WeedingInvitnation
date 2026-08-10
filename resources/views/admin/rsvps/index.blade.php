@extends('admin.layout')
@section('title','RSVP List')
@section('page-title','RSVP Management')
@section('content')
<div style="display:flex;gap:0.5rem;margin-bottom:1.5rem;flex-wrap:wrap;">
<form method="GET" style="display:flex;gap:0.5rem;flex:1;max-width:400px;">
<input type="hidden" name="filter" value="{{ $filter }}">
<input type="text" name="search" value="{{ $search }}" placeholder="Search by name..." style="padding:0.5rem 0.75rem;border:1px solid #ddd;font-size:0.875rem;outline:none;flex:1;min-height:40px;">
<button type="submit" class="btn-forest" style="font-size:0.8rem;padding:0.5rem 1rem;min-height:40px;">Search</button>
</form>
<div style="display:flex;gap:0.5rem;">
<a href="{{ route('admin.rsvps.index') }}" class="{{ !$filter ? 'btn-forest' : 'btn-outline-gold' }}" style="font-size:0.75rem;padding:0.5rem 0.75rem;min-height:40px;">All</a>
<a href="{{ route('admin.rsvps.index',['filter'=>'hadir']) }}" class="{{ $filter==='hadir' ? 'btn-forest' : 'btn-outline-gold' }}" style="font-size:0.75rem;padding:0.5rem 0.75rem;min-height:40px;">Hadir</a>
<a href="{{ route('admin.rsvps.index',['filter'=>'tidak_hadir']) }}" class="{{ $filter==='tidak_hadir' ? 'btn-forest' : 'btn-outline-gold' }}" style="font-size:0.75rem;padding:0.5rem 0.75rem;min-height:40px;">Tidak Hadir</a>
<a href="{{ route('admin.rsvps.index',['filter'=>'belum_pasti']) }}" class="{{ $filter==='belum_pasti' ? 'btn-forest' : 'btn-outline-gold' }}" style="font-size:0.75rem;padding:0.5rem 0.75rem;min-height:40px;">Belum Pasti</a>
</div>
</div>
<div style="background:white;box-shadow:0 1px 8px rgba(0,0,0,0.06);overflow:auto;">
<table style="width:100%;border-collapse:collapse;font-size:0.875rem;">
<thead>
<tr style="background:#F5F5F0;border-bottom:2px solid #e5e5e5;">
<th style="padding:0.75rem 1rem;text-align:left;font-weight:600;color:#2D4A3E;">Name</th>
<th style="padding:0.75rem 1rem;text-align:left;font-weight:600;color:#2D4A3E;">Status</th>
<th style="padding:0.75rem 1rem;text-align:left;font-weight:600;color:#2D4A3E;">Guests</th>
<th style="padding:0.75rem 1rem;text-align:left;font-weight:600;color:#2D4A3E;">Message</th>
<th style="padding:0.75rem 1rem;text-align:left;font-weight:600;color:#2D4A3E;">Date</th>
<th style="padding:0.75rem 1rem;text-align:left;font-weight:600;color:#2D4A3E;">Action</th>
</tr>
</thead>
<tbody>
@forelse($rsvps as $rsvp)
<tr style="border-bottom:1px solid #f0f0f0;">
<td style="padding:0.75rem 1rem;font-weight:500;">{{ $rsvp->name }}</td>
<td style="padding:0.75rem 1rem;">
@if($rsvp->attendance_status==='hadir')
<span style="background:#f0fdf4;color:#166534;font-size:0.7rem;padding:0.2rem 0.6rem;border-radius:9999px;">&#10003; Hadir</span>
@elseif($rsvp->attendance_status==='tidak_hadir')
<span style="background:#fef2f2;color:#991b1b;font-size:0.7rem;padding:0.2rem 0.6rem;border-radius:9999px;">&#10007; Tidak Hadir</span>
@else
<span style="background:#fef3c7;color:#92400e;font-size:0.7rem;padding:0.2rem 0.6rem;border-radius:9999px;">? Belum Pasti</span>
@endif
</td>
<td style="padding:0.75rem 1rem;">{{ $rsvp->guest_count }}</td>
<td style="padding:0.75rem 1rem;color:#666;max-width:200px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">{{ $rsvp->message ?? '-' }}</td>
<td style="padding:0.75rem 1rem;color:#888;font-size:0.8rem;">{{ $rsvp->created_at->format('d/m/Y') }}</td>
<td style="padding:0.75rem 1rem;">
<form method="POST" action="{{ route('admin.rsvps.destroy',$rsvp) }}" onsubmit="return confirm('Delete this RSVP?')">
@csrf @method('DELETE')
<button type="submit" style="font-size:0.75rem;color:#ef4444;background:none;border:1px solid #ef4444;cursor:pointer;padding:0.25rem 0.5rem;">Delete</button>
</form>
</td>
</tr>
@empty
<tr><td colspan="6" style="padding:2rem;text-align:center;color:#888;font-style:italic;">No RSVPs found.</td></tr>
@endforelse
</tbody>
</table>
</div>
<div style="margin-top:1rem;">{{ $rsvps->links() }}</div>
@endsection
