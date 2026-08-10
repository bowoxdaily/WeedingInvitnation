<section id="location" style="background-color:#FDFBF7;padding:5rem 1.5rem;position:relative;overflow:hidden;">
<!-- Floral Corner Decorations -->
<svg class="floral-corner-tl floral-float" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M10 10C15 25 25 35 40 40C55 45 70 45 85 40C70 55 65 75 65 95C65 115 70 135 85 145C70 140 50 145 35 160C20 175 10 190 10 190" stroke="#C9A84C" stroke-width="1.5" stroke-linecap="round" fill="none" opacity="0.6"/>
<circle cx="45" cy="45" r="8" fill="#C9A84C" opacity="0.3"/>
</svg>
<svg class="floral-corner-br floral-float" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M10 10C15 25 25 35 40 40C55 45 70 45 85 40C70 55 65 75 65 95C65 115 70 135 85 145C70 140 50 145 35 160C20 175 10 190 10 190" stroke="#C9A84C" stroke-width="1.5" stroke-linecap="round" fill="none" opacity="0.6"/>
<circle cx="45" cy="45" r="8" fill="#C9A84C" opacity="0.3"/>
</svg>
<div class="container-wedding" style="text-align:center;position:relative;z-index:2;">
<p class="section-subtitle" data-aos="fade-up">Temukan Kami Di</p>
<h2 class="section-title" data-aos="fade-up" data-aos-delay="100">Lokasi Acara</h2>
<div class="section-divider" data-aos="fade-up" data-aos-delay="150"><span>&#10022;</span></div>
<div style="position:relative;width:100%;padding-bottom:56.25%;background:#E8EFE7;overflow:hidden;margin-bottom:1.5rem;" data-aos="fade-up" data-aos-delay="200">
@if(!empty($settings['maps_embed_url']))
<iframe src="{{ $settings['maps_embed_url'] }}" style="position:absolute;inset:0;width:100%;height:100%;border:0;" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen title="Wedding Location"></iframe>
@else
<div style="position:absolute;inset:0;display:flex;align-items:center;justify-content:center;background:#E8EFE7;">
<p style="color:#888;font-style:italic;">Map will be displayed here</p>
</div>
@endif
</div>
<div style="display:flex;justify-content:center;gap:1rem;flex-wrap:wrap;" data-aos="fade-up" data-aos-delay="250">
<a href="{{ $settings['reception_maps_url'] ?? 'https://maps.google.com' }}" target="_blank" class="btn-forest">Open Maps</a>
<a href="{{ $settings['akad_maps_url'] ?? 'https://maps.google.com' }}" target="_blank" class="btn-outline-gold">Akad Location</a>
</div>
</div>
</section>
