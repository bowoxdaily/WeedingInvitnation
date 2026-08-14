<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login - Wedding Bowo &amp; Riska</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style="background:linear-gradient(135deg,#1F3530,#2D4A3E);min-height:100vh;display:flex;align-items:center;justify-content:center;padding:1rem;">
<div style="width:100%;max-width:400px;">
<div style="text-align:center;margin-bottom:2rem;">
<h1 style="font-family:'Cormorant Garamond',Georgia,serif;font-size:2rem;color:white;font-weight:500;">Admin Panel</h1>
<p style="font-size:0.75rem;letter-spacing:0.2em;color:rgba(201,168,76,0.8);">WEDDING BOWO &amp; RISKA</p>
</div>
<div class="p-6 sm:p-10" style="background:white;box-shadow:0 20px 60px rgba(0,0,0,0.3);">
@if($errors->any())
<div style="background:#fee;border-left:3px solid #e74c3c;padding:0.75rem 1rem;margin-bottom:1.5rem;font-size:0.875rem;color:#c0392b;">
{{ $errors->first() }}
</div>
@endif
<form method="POST" action="{{ route('admin.login.post') }}">
@csrf
<div style="margin-bottom:1.25rem;">
<label class="form-label">Email Address</label>
<input type="email" name="email" value="{{ old('email') }}" class="form-input" placeholder="admin@wedding.com" required autofocus>
</div>
<div style="margin-bottom:1.5rem;">
<label class="form-label">Password</label>
<input type="password" name="password" class="form-input" placeholder="••••••••" required>
</div>
<div style="display:flex;align-items:center;gap:0.5rem;margin-bottom:1.5rem;">
<input type="checkbox" name="remember" id="remember" style="width:16px;height:16px;cursor:pointer;">
<label for="remember" style="font-size:0.8rem;color:#666;cursor:pointer;">Remember me</label>
</div>
<button type="submit" class="btn-gold" style="width:100%;">Login to Admin</button>
</form>
</div>
<p style="text-align:center;margin-top:1.5rem;font-size:0.75rem;color:rgba(255,255,255,0.4);">
<a href="{{ route('invitation') }}" style="color:rgba(201,168,76,0.7);text-decoration:none;">&#8592; Back to Invitation</a>
</p>
</div>
</body>
</html>
