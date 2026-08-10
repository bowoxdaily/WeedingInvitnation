<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title', 'Admin') - Wedding Admin</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style="background:#F5F5F0;min-height:100vh;display:flex;">
<aside class="admin-sidebar" style="width:240px;flex-shrink:0;position:fixed;height:100vh;overflow-y:auto;z-index:100;">
<div style="padding:1.5rem 1rem;border-bottom:1px solid rgba(255,255,255,0.08);">
<h2 style="font-family:'Cormorant Garamond',serif;font-size:1.25rem;color:white;margin-bottom:0.25rem;">Admin Panel</h2>
<p style="font-size:0.65rem;letter-spacing:0.2em;color:rgba(201,168,76,0.7);">BOWO &amp; RISKA</p>
</div>
<nav style="padding:1rem 0;">
<a href="{{ route('admin.dashboard') }}" class="admin-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">&#9635; Dashboard</a>
<a href="{{ route('admin.guests.index') }}" class="admin-nav-link {{ request()->routeIs('admin.guests.*') ? 'active' : '' }}">&#128101; Guests</a>
<a href="{{ route('admin.rsvps.index') }}" class="admin-nav-link {{ request()->routeIs('admin.rsvps.*') ? 'active' : '' }}">&#9990; RSVP</a>
<a href="{{ route('admin.guestbooks.index') }}" class="admin-nav-link {{ request()->routeIs('admin.guestbooks.*') ? 'active' : '' }}">&#128172; Guestbook</a>
<a href="{{ route('admin.gallery.index') }}" class="admin-nav-link {{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">&#128247; Gallery</a>
<a href="{{ route('admin.settings.index') }}" class="admin-nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">&#9881; Settings</a>
<a href="javascript:void(0)" onclick="openWaGeneratorModal()" class="admin-nav-link" style="color:#25D366;font-weight:600;">⚡ WA Link Generator</a>
<div style="border-top:1px solid rgba(255,255,255,0.08);margin:0.5rem 0;"></div>
<a href="{{ route('invitation') }}" target="_blank" class="admin-nav-link">&#8599; View Site</a>
<form method="POST" action="{{ route('admin.logout') }}" style="padding:0 0.25rem;">
@csrf
<button type="submit" style="width:100%;text-align:left;background:none;border:none;cursor:pointer;display:flex;align-items:center;gap:0.75rem;padding:0.75rem 0.75rem;color:rgba(255,255,255,0.5);font-size:0.875rem;transition:all 0.2s;">&#10005; Logout</button>
</form>
</nav>
</aside>
<main style="margin-left:240px;flex:1;min-height:100vh;">
<header style="background:white;padding:1rem 1.5rem;border-bottom:1px solid #e5e5e5;display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;z-index:50;">
<h1 style="font-size:1.1rem;font-weight:600;color:#2D4A3E;">@yield('page-title','Dashboard')</h1>
<span style="font-size:0.8rem;color:#888;">{{ Auth::guard('admin')->user()->name ?? 'Admin' }}</span>
</header>
<div style="padding:1.5rem;">
@if(session('success'))
<div style="background:#f0fdf4;border-left:3px solid #22c55e;padding:0.75rem 1rem;margin-bottom:1.5rem;font-size:0.875rem;color:#166534;">{{ session('success') }}</div>
@endif
@if(session('error'))
<div style="background:#fef2f2;border-left:3px solid #ef4444;padding:0.75rem 1rem;margin-bottom:1.5rem;font-size:0.875rem;color:#991b1b;">{{ session('error') }}</div>
@endif
@yield('content')
</div>
</main>
@include('admin.partials.wa_generator_modal')
</body>
</html>
