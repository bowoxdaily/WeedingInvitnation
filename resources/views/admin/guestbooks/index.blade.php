@extends('admin.layout')
@section('title','Guestbook')
@section('page-title','Guestbook Messages')
@section('content')
<form method="GET" style="display:flex;gap:0.5rem;margin-bottom:1.5rem;max-width:400px;">
<input type="text" name="search" value="{{ $search }}" placeholder="Search messages..." style="padding:0.5rem 0.75rem;border:1px solid #ddd;font-size:0.875rem;outline:none;flex:1;min-height:40px;">
<button type="submit" class="btn-forest" style="font-size:0.8rem;padding:0.5rem 1rem;min-height:40px;">Search</button>
</form>
<div style="background:white;box-shadow:0 1px 8px rgba(0,0,0,0.06);overflow:auto;">
<table style="width:100%;border-collapse:collapse;font-size:0.875rem;">
<thead>
<tr style="background:#F5F5F0;border-bottom:2px solid #e5e5e5;">
<th style="padding:0.75rem 1rem;text-align:left;font-weight:600;color:#2D4A3E;">Name</th>
<th style="padding:0.75rem 1rem;text-align:left;font-weight:600;color:#2D4A3E;">Message</th>
<th style="padding:0.75rem 1rem;text-align:left;font-weight:600;color:#2D4A3E;">Status</th>
<th style="padding:0.75rem 1rem;text-align:left;font-weight:600;color:#2D4A3E;">Date</th>
<th style="padding:0.75rem 1rem;text-align:left;font-weight:600;color:#2D4A3E;">Actions</th>
</tr>
</thead>
<tbody>
@forelse($guestbooks as $entry)
<tr style="border-bottom:1px solid #f0f0f0;{{ $entry->status==='hidden' ? 'opacity:0.5;' : '' }}">
<td style="padding:0.75rem 1rem;font-weight:500;">{{ $entry->name }}</td>
<td style="padding:0.75rem 1rem;color:#666;max-width:300px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">{{ $entry->message }}</td>
<td style="padding:0.75rem 1rem;">
@if($entry->status==='visible')
<span style="background:#f0fdf4;color:#166534;font-size:0.7rem;padding:0.2rem 0.6rem;border-radius:9999px;">Visible</span>
@else
<span style="background:#f5f5f5;color:#666;font-size:0.7rem;padding:0.2rem 0.6rem;border-radius:9999px;">Hidden</span>
@endif
</td>
<td style="padding:0.75rem 1rem;color:#888;font-size:0.8rem;">{{ $entry->created_at->format('d/m/Y') }}</td>
<td style="padding:0.75rem 1rem;">
<div style="display:flex;gap:0.5rem;">
<form method="POST" action="{{ route('admin.guestbooks.toggle',$entry) }}">
@csrf @method('PATCH')
<button type="submit" style="font-size:0.7rem;color:#2D4A3E;background:none;border:1px solid #2D4A3E;cursor:pointer;padding:0.25rem 0.5rem;white-space:nowrap;">{{ $entry->status==='visible' ? 'Hide' : 'Show' }}</button>
</form>
<form method="POST" action="{{ route('admin.guestbooks.destroy',$entry) }}" onsubmit="return confirm('Delete?')">
@csrf @method('DELETE')
<button type="submit" style="font-size:0.7rem;color:#ef4444;background:none;border:1px solid #ef4444;cursor:pointer;padding:0.25rem 0.5rem;">Del</button>
</form>
</div>
</td>
</tr>
@empty
<tr><td colspan="5" style="padding:2rem;text-align:center;color:#888;font-style:italic;">No messages found.</td></tr>
@endforelse
</tbody>
</table>
</div>
<div style="margin-top:1rem;">{{ $guestbooks->links() }}</div>
@endsection
