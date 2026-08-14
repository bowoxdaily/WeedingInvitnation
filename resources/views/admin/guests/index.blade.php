@extends('admin.layout')
@section('title','Guests')
@section('page-title','Guest List')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-6">
<form method="GET" class="flex gap-2 w-full min-w-0 sm:w-auto">
<input type="text" name="search" value="{{ $search }}" placeholder="Search guests..." class="min-w-0" style="padding:0.5rem 0.75rem;border:1px solid #ddd;font-size:0.875rem;outline:none;flex:1;min-height:40px;">
<button type="submit" class="btn-forest" style="font-size:0.8rem;padding:0.5rem 1rem;min-height:40px;">Search</button>
@if($search)<a href="{{ route('admin.guests.index') }}" class="btn-outline-gold" style="font-size:0.8rem;padding:0.5rem 1rem;min-height:40px;display:inline-flex;align-items:center;">Clear</a>@endif
</form>
<div class="flex flex-wrap gap-2 items-center">
<button type="button" onclick="openWaGeneratorModal()" style="font-size:0.8rem;padding:0.5rem 1rem;min-height:40px;background:#25D366;color:white;border:none;border-radius:4px;font-weight:600;cursor:pointer;display:inline-flex;align-items:center;gap:0.4rem;flex:1;" class="sm:flex-none justify-center">⚡ WA Link Generator</button>
<a href="{{ route('admin.guests.create') }}" class="btn-gold sm:flex-none" style="font-size:0.8rem;padding:0.5rem 1.25rem;min-height:40px;display:inline-flex;align-items:center;justify-content:center;flex:1;">+ Add Guest</a>
</div>
</div>

<!-- Mobile Card View -->
<div class="block md:hidden space-y-3">
@forelse($guests as $guest)
<div class="bg-white p-4 shadow-sm rounded border border-gray-100">
    <div class="flex items-center justify-between mb-2">
        <h4 class="font-semibold text-gray-800 text-sm min-w-0 break-words pr-2">{{ $guest->name }}</h4>
        @if($guest->rsvp_count > 0)
        <span class="whitespace-nowrap" style="background:#f0fdf4;color:#166534;font-size:0.7rem;padding:0.2rem 0.6rem;border-radius:9999px;">RSVP Done</span>
        @else
        <span class="whitespace-nowrap" style="background:#fef3c7;color:#92400e;font-size:0.7rem;padding:0.2rem 0.6rem;border-radius:9999px;">RSVP Pending</span>
        @endif
    </div>
    <div class="text-xs text-gray-500 mb-3 space-y-1">
        <p><strong>Phone:</strong> {{ $guest->phone ?? '-' }}</p>
        <p><strong>Limit:</strong> {{ $guest->guest_limit }} person(s)</p>
    </div>
    <div class="pt-2 border-t border-gray-100 grid grid-cols-2 gap-2">
        <button onclick="navigator.clipboard.writeText('{{ url('/?to=' . urlencode($guest->name)) }}');alert('Link copied for {{ addslashes($guest->name) }}!');" style="font-size:0.75rem;color:#C9A84C;background:none;border:1px solid #C9A84C;cursor:pointer;padding:0.4rem 0.5rem;border-radius:4px;text-align:center;">Copy Link</button>
        <button onclick="openWaGeneratorModal('{{ addslashes($guest->name) }}', '{{ addslashes($guest->phone ?? '') }}')" style="font-size:0.75rem;color:#166534;background:#f0fdf4;border:1px solid #22c55e;cursor:pointer;padding:0.4rem 0.5rem;border-radius:4px;text-align:center;">WA Link</button>
        <a href="{{ route('admin.guests.edit',$guest) }}" style="font-size:0.75rem;color:#2D4A3E;text-decoration:none;padding:0.4rem 0.5rem;border:1px solid #2D4A3E;border-radius:4px;text-align:center;">Edit</a>
        <form method="POST" action="{{ route('admin.guests.destroy',$guest) }}" onsubmit="return confirm('Delete this guest?')" style="display:block;">
            @csrf @method('DELETE')
            <button type="submit" style="font-size:0.75rem;color:#ef4444;background:none;border:1px solid #ef4444;cursor:pointer;padding:0.4rem 0.5rem;border-radius:4px;width:100%;">Delete</button>
        </form>
    </div>
</div>
@empty
<div class="bg-white p-6 text-center text-gray-400 italic rounded border border-gray-100">No guests found.</div>
@endforelse
</div>

<!-- Desktop Table View -->
<div class="hidden md:block" style="background:white;box-shadow:0 1px 8px rgba(0,0,0,0.06);overflow:auto;">
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
<button onclick="openWaGeneratorModal('{{ addslashes($guest->name) }}', '{{ addslashes($guest->phone ?? '') }}')" style="font-size:0.75rem;color:#166534;background:#f0fdf4;border:1px solid #22c55e;cursor:pointer;padding:0.25rem 0.5rem;border-radius:3px;">WA Generator</button>
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
