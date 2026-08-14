<section id="event" style="background-color:#FAF6F0;padding:5rem 1.5rem;position:relative;overflow:hidden;">
<!-- Floral Corner Decorations -->
<svg class="floral-corner-tl floral-float" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M10 10C15 25 25 35 40 40C55 45 70 45 85 40C70 55 65 75 65 95C65 115 70 135 85 145C70 140 50 145 35 160C20 175 10 190 10 190" stroke="#C9A84C" stroke-width="1.5" stroke-linecap="round" fill="none" opacity="0.6"/>
<circle cx="45" cy="45" r="8" fill="#C9A84C" opacity="0.3"/>
<circle cx="25" cy="70" r="6" fill="#E8D08A" opacity="0.4"/>
</svg>
<svg class="floral-corner-br floral-float" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M10 10C15 25 25 35 40 40C55 45 70 45 85 40C70 55 65 75 65 95C65 115 70 135 85 145C70 140 50 145 35 160C20 175 10 190 10 190" stroke="#C9A84C" stroke-width="1.5" stroke-linecap="round" fill="none" opacity="0.6"/>
<circle cx="45" cy="45" r="8" fill="#C9A84C" opacity="0.3"/>
</svg>
<div class="container-wedding">
<p class="section-subtitle" data-aos="fade-up">Rangkaian Acara</p>
<h2 class="section-title" data-aos="fade-up" data-aos-delay="100">Wedding Event</h2>
<div class="section-divider" data-aos="fade-up" data-aos-delay="150"><span>&#10022;</span></div>
<div style="display:grid;grid-template-columns:1fr;gap:2rem;max-width:700px;margin:0 auto;" class="event-grid">
<div class="luxury-glass-card p-6 sm:p-10" style="text-align:center;" data-aos="fade-up" data-aos-delay="200">
<div style="width:60px;height:60px;border-radius:50%;background:linear-gradient(135deg,#C9A84C,#E8D08A);display:flex;align-items:center;justify-content:center;margin:0 auto 1.5rem;font-size:1.5rem;box-shadow:0 4px 15px rgba(201,168,76,0.3);">💍</div>
<p style="font-size:0.65rem;letter-spacing:0.3em;text-transform:uppercase;color:#C9A84C;margin-bottom:0.75rem;font-weight:600;">Akad Nikah</p>
<h3 style="font-family:'Cormorant Garamond',Georgia,serif;font-size:1.75rem;color:#2D4A3E;margin-bottom:1.5rem;">Minggu, {{ $settings['wedding_date'] ?? '16 Agustus 2026' }}</h3>
<p style="font-size:0.875rem;color:#555;margin-bottom:0.5rem;">&#9200; {{ $settings['akad_time'] ?? '08.00 - 10.00 WIB' }}</p>
<p style="font-size:0.875rem;font-weight:600;color:#2D4A3E;">{{ $settings['akad_venue'] ?? 'Masjid Al-Ikhlas' }}</p>
<p style="font-size:0.8rem;color:#888;margin-bottom:1.5rem;">{{ $settings['akad_address'] ?? 'Jl. Contoh No. 123' }}</p>
<div style="display:flex;flex-direction:column;gap:0.6rem;justify-content:center;align-items:center;">
<a href="{{ $settings['akad_maps_url'] ?? 'https://maps.google.com' }}" target="_blank" class="btn-outline-gold" style="font-size:0.75rem;padding:0.625rem 1.25rem;min-height:42px;width:100%;max-width:220px;display:inline-flex;align-items:center;justify-content:center;gap:0.4rem;">
  <svg style="width:14px;height:14px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
  Open Google Maps
</a>
<button onclick="window.addToGoogleCalendar()" class="btn-forest" style="font-size:0.75rem;padding:0.625rem 1.25rem;min-height:42px;width:100%;max-width:220px;display:inline-flex;align-items:center;justify-content:center;gap:0.4rem;">
  <svg style="width:14px;height:14px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
  Add to Calendar
</button>
</div>
</div>
<div class="luxury-glass-card p-6 sm:p-10" style="text-align:center;" data-aos="fade-up" data-aos-delay="300">
<div style="width:60px;height:60px;border-radius:50%;background:linear-gradient(135deg,#C9A84C,#E8D08A);display:flex;align-items:center;justify-content:center;margin:0 auto 1.5rem;font-size:1.5rem;box-shadow:0 4px 15px rgba(201,168,76,0.3);">🥂</div>
<p style="font-size:0.65rem;letter-spacing:0.3em;text-transform:uppercase;color:#C9A84C;margin-bottom:0.75rem;font-weight:600;">Resepsi Pernikahan</p>
<h3 style="font-family:'Cormorant Garamond',Georgia,serif;font-size:1.75rem;color:#2D4A3E;margin-bottom:1.5rem;">Minggu, {{ $settings['wedding_date'] ?? '16 Agustus 2026' }}</h3>
<p style="font-size:0.875rem;color:#555;margin-bottom:0.5rem;">&#9200; {{ $settings['reception_time'] ?? '11.00 - 14.00 WIB' }}</p>
<p style="font-size:0.875rem;font-weight:600;color:#2D4A3E;">{{ $settings['reception_venue'] ?? 'Gedung Serbaguna Indah' }}</p>
<p style="font-size:0.8rem;color:#888;margin-bottom:1.5rem;">{{ $settings['reception_address'] ?? 'Jl. Contoh No. 456' }}</p>
<div style="display:flex;flex-direction:column;gap:0.6rem;justify-content:center;align-items:center;">
<a href="{{ $settings['reception_maps_url'] ?? 'https://maps.google.com' }}" target="_blank" class="btn-outline-gold" style="font-size:0.75rem;padding:0.625rem 1.25rem;min-height:42px;width:100%;max-width:220px;display:inline-flex;align-items:center;justify-content:center;gap:0.4rem;">
  <svg style="width:14px;height:14px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
  Open Google Maps
</a>
<button onclick="window.addToGoogleCalendar()" class="btn-forest" style="font-size:0.75rem;padding:0.625rem 1.25rem;min-height:42px;width:100%;max-width:220px;display:inline-flex;align-items:center;justify-content:center;gap:0.4rem;">
  <svg style="width:14px;height:14px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
  Add to Calendar
</button>
</div>
</div>
</div>
<style>@media(min-width:640px){.event-grid{grid-template-columns:1fr 1fr!important;}}</style>
</div>
</section>
