@extends('admin.layout')
@section('title','Add Guest')
@section('page-title','Add New Guest')
@section('content')
<div style="max-width:500px;">
<div style="background:white;padding:2rem;box-shadow:0 1px 8px rgba(0,0,0,0.06);">
<form method="POST" action="{{ route('admin.guests.store') }}">
@csrf
<div style="margin-bottom:1.25rem;">
<label class="form-label">Guest Name *</label>
<input type="text" name="name" value="{{ old('name') }}" class="form-input" required maxlength="100">
@error('name')<p style="color:#ef4444;font-size:0.75rem;margin-top:0.25rem;">{{ $message }}</p>@enderror
</div>
<div style="margin-bottom:1.25rem;">
<label class="form-label">Phone Number</label>
<input type="text" name="phone" value="{{ old('phone') }}" class="form-input" maxlength="20">
</div>
<div style="margin-bottom:1.5rem;">
<label class="form-label">Guest Limit *</label>
<select name="guest_limit" class="form-input" required>
@for($i=1;$i<=10;$i++)<option value="{{ $i }}" {{ old('guest_limit',2)==$i?'selected':'' }}>{{ $i }} person(s)</option>@endfor
</select>
</div>
<div style="display:flex;gap:0.75rem;">
<button type="submit" class="btn-gold" style="flex:1;">Save Guest</button>
<a href="{{ route('admin.guests.index') }}" class="btn-outline-gold" style="flex:1;text-align:center;">Cancel</a>
</div>
</form>
</div>
</div>
@endsection
