@extends('admin.layout')
@section('title','Gallery')
@section('page-title','Gallery Management')
@section('content')
<div style="background:white;padding:1.5rem;margin-bottom:1.5rem;box-shadow:0 1px 8px rgba(0,0,0,0.06);">
<h3 style="font-size:0.9rem;font-weight:600;color:#2D4A3E;margin-bottom:1rem;">Upload New Photos</h3>
<form method="POST" action="{{ route('admin.gallery.store') }}" enctype="multipart/form-data">
@csrf
<div style="margin-bottom:1rem;">
<input type="file" name="images[]" multiple accept="image/*" style="font-size:0.875rem;padding:0.5rem;border:2px dashed #C9A84C;width:100%;cursor:pointer;min-height:48px;">
<p style="font-size:0.75rem;color:#888;margin-top:0.25rem;">Max 20 images, 5MB each. JPG, PNG, WebP accepted.</p>
</div>
@error('images')<p style="color:#ef4444;font-size:0.75rem;margin-bottom:0.5rem;">{{ $message }}</p>@enderror
@error('images.*')<p style="color:#ef4444;font-size:0.75rem;margin-bottom:0.5rem;">{{ $message }}</p>@enderror
<button type="submit" class="btn-gold" style="font-size:0.8rem;padding:0.625rem 1.5rem;min-height:40px;">Upload Photos</button>
</form>
</div>

<div style="background:white;padding:1.5rem;box-shadow:0 1px 8px rgba(0,0,0,0.06);">
<h3 style="font-size:0.9rem;font-weight:600;color:#2D4A3E;margin-bottom:1rem;">Gallery Photos ({{ $galleries->count() }})</h3>
@if($galleries->count() > 0)
<div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(150px,1fr));gap:1rem;">
@foreach($galleries as $photo)
<div style="position:relative;group;">
<img src="{{ $photo->thumbnail ?? $photo->image }}" alt="" style="width:100%;height:150px;object-fit:cover;display:block;">
<div style="position:absolute;top:0.5rem;right:0.5rem;">
<form method="POST" action="{{ route('admin.gallery.destroy',$photo) }}" onsubmit="return confirm('Delete this photo?')">
@csrf @method('DELETE')
<button type="submit" style="background:rgba(239,68,68,0.9);border:none;color:white;width:28px;height:28px;cursor:pointer;font-size:1rem;line-height:1;display:flex;align-items:center;justify-content:center;">&times;</button>
</form>
</div>
<p style="font-size:0.65rem;color:#888;text-align:center;padding:0.25rem;background:#f5f5f5;">Order: {{ $photo->sort_order }}</p>
</div>
@endforeach
</div>
@else
<p style="color:#888;font-style:italic;text-align:center;padding:2rem;">No photos uploaded yet.</p>
@endif
</div>
@endsection
