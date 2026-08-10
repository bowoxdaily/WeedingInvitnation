<section id="couple" style="background-color:#FAF6F0;padding:5rem 1.5rem;position:relative;overflow:hidden;">
<!-- Floral Corner Decorations -->
<svg class="floral-corner-tl floral-float" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M10 10C15 25 25 35 40 40C55 45 70 45 85 40C70 55 65 75 65 95C65 115 70 135 85 145C70 140 50 145 35 160C20 175 10 190 10 190" stroke="#C9A84C" stroke-width="1.5" stroke-linecap="round" fill="none" opacity="0.6"/>
<circle cx="45" cy="45" r="8" fill="#C9A84C" opacity="0.3"/>
<circle cx="25" cy="70" r="6" fill="#E8D08A" opacity="0.4"/>
<circle cx="70" cy="25" r="5" fill="#C9A84C" opacity="0.35"/>
<path d="M15 15Q25 30 40 35Q55 40 65 35" stroke="#E8D08A" stroke-width="1" fill="none" opacity="0.5"/>
</svg>
<svg class="floral-corner-tr floral-float-slow" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M10 10C15 25 25 35 40 40C55 45 70 45 85 40C70 55 65 75 65 95C65 115 70 135 85 145C70 140 50 145 35 160C20 175 10 190 10 190" stroke="#C9A84C" stroke-width="1.5" stroke-linecap="round" fill="none" opacity="0.6"/>
<circle cx="45" cy="45" r="8" fill="#C9A84C" opacity="0.3"/>
<circle cx="25" cy="70" r="6" fill="#E8D08A" opacity="0.4"/>
<circle cx="70" cy="25" r="5" fill="#C9A84C" opacity="0.35"/>
</svg>
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