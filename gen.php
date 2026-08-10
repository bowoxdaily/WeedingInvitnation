<?php
function w($p,$c){@mkdir(dirname($p),0755,true);file_put_contents($p,$c);echo "OK:".basename($p)."\n";}
$b = 'D:/Project/weedding_invination/resources/views/wedding';

// LOADING PARTIAL
$loading = <<<'HTML'
<div id="loading-screen">
<div style="text-align:center;color:white;">
<p style="font-family:'Cormorant Garamond',Georgia,serif;font-size:3.5rem;font-weight:600;color:#C9A84C;letter-spacing:0.1em;">B <span style="color:white;font-size:2rem;">&amp;</span> R</p>
<p style="font-size:0.7rem;letter-spacing:0.3em;color:rgba(255,255,255,0.6);margin-top:0.5rem;">WEDDING INVITATION</p>
<div style="display:flex;justify-content:center;gap:0.5rem;margin-top:2rem;">
<div style="width:6px;height:6px;border-radius:50%;background:#C9A84C;animation:ldot 1.4s infinite;"></div>
<div style="width:6px;height:6px;border-radius:50%;background:#C9A84C;animation:ldot 1.4s 0.2s infinite;"></div>
<div style="width:6px;height:6px;border-radius:50%;background:#C9A84C;animation:ldot 1.4s 0.4s infinite;"></div>
</div>
</div>
<style>@keyframes ldot{0%,100%{transform:translateY(0);}50%{transform:translateY(-8px);}}</style>
</div>
HTML;
w("$b/partials/loading.blade.php", $loading);

// COVER PARTIAL
$cover = file_get_contents(__DIR__ . '/partials_cover.php');

// Generate cover partial with PHP string concat
$coverContent = '<div id="cover-page">' . "\n" .
'<div style="position:absolute;inset:0;"><img src="{{ $settings[\'hero_photo\'] ?? \'/images/placeholder-hero.jpg\' }}" alt="" style="width:100%;height:100%;object-fit:cover;opacity:0.3;"></div>' . "\n" .
'<div style="position:absolute;inset:0;background:linear-gradient(to bottom,rgba(31,53,48,0.6),rgba(31,53,48,0.85));"></div>' . "\n" .
'<div style="position:relative;z-index:1;text-align:center;padding:2rem 1.5rem;max-width:480px;margin:0 auto;">' . "\n" .
'<p style="color:#C9A84C;font-size:1.5rem;margin-bottom:1.5rem;">&#10022;</p>' . "\n" .
'<p style="font-size:0.7rem;letter-spacing:0.35em;text-transform:uppercase;color:rgba(255,255,255,0.7);margin-bottom:1rem;">The Wedding Of</p>' . "\n" .
'<h1 style="font-family:\'Cormorant Garamond\',Georgia,serif;font-size:clamp(3.5rem,12vw,6rem);font-weight:600;color:white;line-height:0.9;margin-bottom:0.5rem;">' . "\n" .
"{{ \$settings['groom_nickname'] ?? 'Bowo' }}\n" .
'<span style="display:block;font-size:clamp(1.5rem,5vw,2rem);color:#C9A84C;font-style:italic;margin:0.5rem 0;">&amp;</span>' . "\n" .
"{{ \$settings['bride_nickname'] ?? 'Riska' }}\n" .
'</h1>' . "\n" .
'<div style="display:flex;align-items:center;justify-content:center;gap:0.75rem;margin:1.5rem 0;">' . "\n" .
'<div style="height:1px;width:50px;background:linear-gradient(to right,transparent,#C9A84C);"></div>' . "\n" .
"<p style=\"font-size:0.75rem;letter-spacing:0.25em;color:#C9A84C;\">{{ \$settings['wedding_date'] ?? '16 Agustus 2026' }}</p>\n" .
'<div style="height:1px;width:50px;background:linear-gradient(to left,transparent,#C9A84C);"></div>' . "\n" .
'</div>' . "\n" .
"@if(\$guestName)\n" .
'<div style="margin:1.5rem 0;padding:1rem;border:1px solid rgba(201,168,76,0.3);background:rgba(255,255,255,0.05);">' . "\n" .
'<p style="font-size:0.65rem;letter-spacing:0.2em;text-transform:uppercase;color:rgba(255,255,255,0.5);margin-bottom:0.5rem;">Kepada Yth.</p>' . "\n" .
"<p style=\"font-family:'Cormorant Garamond',Georgia,serif;font-size:1.4rem;color:white;font-style:italic;\">{{ \$guestName }}</p>\n" .
'</div>' . "\n" .
"@endif\n" .
"<button onclick=\"openInvitation()\" class=\"btn-gold\" style=\"width:100%;max-width:280px;margin:0 auto;display:flex;justify-content:center;\">Open Invitation</button>\n" .
'<p style="color:#C9A84C;font-size:1.5rem;margin-top:1.5rem;">&#10022;</p>' . "\n" .
'</div>' . "\n" .
'</div>';
w("$b/partials/cover.blade.php", $coverContent);

echo "Partials done!\n";

'<html lang="id">' . "\n" .
'<head>' . "\n" .
'<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">' . "\n" .
'<meta name="csrf-token" content="{{ csrf_token() }}">' . "\n" .
"<title>Wedding of {{ \$settings['groom_nickname'] ?? 'Bowo' }} &amp; {{ \$settings['bride_nickname'] ?? 'Riska' }}</title>\n" .
'<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n" .
"@vite(['resources/css/app.css', 'resources/js/app.js'])\n" .
'</head>' . "\n" .
'<body style="background-color:#FFFFF0;overflow-x:hidden;">' . "\n" .
"@include('wedding.partials.loading')\n" .
"@include('wedding.partials.cover', ['settings' => \$settings, 'guestName' => \$guestName])\n" .
"<audio id=\"bg-music\" loop><source src=\"{{ \$settings['music_file'] ?? '/music/wedding-song.mp3' }}\" type=\"audio/mpeg\"></audio>\n" .
"<button id=\"music-btn\" title=\"Toggle Music\" style=\"display:none;\"><span id=\"music-icon\"><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"20\" viewBox=\"0 0 24 24\" fill=\"#1F3530\"><path d=\"M8 5v14l11-7z\"/></svg></span></button>\n" .
"@include('wedding.partials.lightbox')\n" .
'<div id="toast-notification"></div>' . "\n" .
"@include('wedding.sections.hero', ['settings' => \$settings])\n" .
"@include('wedding.sections.quote', ['settings' => \$settings])\n" .
"@include('wedding.sections.couple', ['settings' => \$settings])\n" .
"@include('wedding.sections.countdown', ['settings' => \$settings])\n" .
"@include('wedding.sections.event', ['settings' => \$settings])\n" .
"@include('wedding.sections.location', ['settings' => \$settings])\n" .
"@include('wedding.sections.lovestory', ['loveStory' => \$loveStory])\n" .
"@include('wedding.sections.gallery', ['galleries' => \$galleries])\n" .
"@include('wedding.sections.rsvp', ['settings' => \$settings, 'guestName' => \$guestName])\n" .
"@include('wedding.sections.gift', ['settings' => \$settings])\n" .
"@include('wedding.sections.guestbook', ['guestbooks' => \$guestbooks, 'guestName' => \$guestName])\n" .
"@include('wedding.sections.closing', ['settings' => \$settings])\n" .
"<script>\n" .
"window.openInvitation=function(){\n" .
"    var c=document.getElementById('cover-page');\n" .
"    if(c)c.classList.add('hidden-cover');\n" .
"    document.body.style.overflow='';\n" .
"    var m=document.getElementById('music-btn');\n" .
"    if(m)m.style.display='flex';\n" .
"    if(window.startMusicAfterOpen)window.startMusicAfterOpen();\n" .
"};\n" .
"document.body.style.overflow='hidden';\n" .
"</script>\n" .
'</body></html>';

w("$b/index.blade.php", $index);
echo "Index done\n";


// COUPLE SECTION
w("$b/sections/couple.blade.php", <<<'BLADE'
<section id="couple" style="background-color:white;padding:5rem 1.5rem;">
<div class="container-wedding">
<p class="section-subtitle" data-aos="fade-up">Together With Their Families</p>
<h2 class="section-title" data-aos="fade-up" data-aos-delay="100">Bride &amp; Groom</h2>
<div class="section-divider" data-aos="fade-up" data-aos-delay="150"><span>&#10022;</span></div>
<div style="display:grid;grid-template-columns:1fr;gap:3rem;max-width:700px;margin:0 auto;" class="couple-grid">
<div style="text-align:center;" data-aos="fade-right">
<div style="position:relative;display:inline-block;margin-bottom:1.5rem;">
<img src="{{ $settings['groom_photo'] ?? '/images/placeholder-groom.jpg' }}" alt="{{ $settings['groom_nickname'] ?? 'Bowo' }}" class="couple-photo">
<div style="position:absolute;bottom:-8px;left:50%;transform:translateX(-50%);background:#C9A84C;color:#1F3530;font-size:0.6rem;letter-spacing:0.15em;text-transform:uppercase;padding:0.25rem 0.75rem;white-space:nowrap;">THE GROOM</div>
</div>
<h3 style="font-family:'Cormorant Garamond',Georgia,serif;font-size:2rem;color:#2D4A3E;margin-top:1.5rem;margin-bottom:0.5rem;">{{ $settings['groom_name'] ?? 'Bowo Prasetyo' }}</h3>
<p style="font-size:0.8rem;color:#888;margin-bottom:0.25rem;">Putra dari</p>
<p style="font-size:0.9rem;color:#555;">{{ $settings['groom_father'] ?? 'Bapak Suharto' }}</p>
<p style="font-size:0.9rem;color:#555;">&amp; {{ $settings['groom_mother'] ?? 'Ibu Sunarti' }}</p>
@if(!empty($settings['groom_instagram']))
<a href="https://instagram.com/{{ ltrim($settings['groom_instagram'],'@') }}" target="_blank" style="display:inline-flex;align-items:center;gap:0.4rem;margin-top:0.75rem;font-size:0.8rem;color:#C9A84C;text-decoration:none;">
<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
{{ $settings['groom_instagram'] }}
</a>
@endif
</div>
<div style="text-align:center;" data-aos="fade-left">
<div style="position:relative;display:inline-block;margin-bottom:1.5rem;">
<img src="{{ $settings['bride_photo'] ?? '/images/placeholder-bride.jpg' }}" alt="{{ $settings['bride_nickname'] ?? 'Riska' }}" class="couple-photo">
<div style="position:absolute;bottom:-8px;left:50%;transform:translateX(-50%);background:#C9A84C;color:#1F3530;font-size:0.6rem;letter-spacing:0.15em;text-transform:uppercase;padding:0.25rem 0.75rem;white-space:nowrap;">THE BRIDE</div>
</div>
<h3 style="font-family:'Cormorant Garamond',Georgia,serif;font-size:2rem;color:#2D4A3E;margin-top:1.5rem;margin-bottom:0.5rem;">{{ $settings['bride_name'] ?? 'Riska Anggraeni' }}</h3>
<p style="font-size:0.8rem;color:#888;margin-bottom:0.25rem;">Putri dari</p>
<p style="font-size:0.9rem;color:#555;">{{ $settings['bride_father'] ?? 'Bapak Suparman' }}</p>
<p style="font-size:0.9rem;color:#555;">&amp; {{ $settings['bride_mother'] ?? 'Ibu Hartini' }}</p>
@if(!empty($settings['bride_instagram']))
<a href="https://instagram.com/{{ ltrim($settings['bride_instagram'],'@') }}" target="_blank" style="display:inline-flex;align-items:center;gap:0.4rem;margin-top:0.75rem;font-size:0.8rem;color:#C9A84C;text-decoration:none;">
<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
{{ $settings['bride_instagram'] }}
</a>
@endif
</div>
</div>
<style>@media(min-width:640px){.couple-grid{grid-template-columns:1fr 1fr!important;gap:2rem!important;}}</style>
</div>
</section>
BLADE);

echo "quote + couple done\n";



