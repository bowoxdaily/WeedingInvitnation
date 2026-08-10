<section id="gallery" style="background-color:#FDFBF7;padding:5rem 1.5rem;position:relative;overflow:hidden;">
<!-- Floral Corner Decorations -->
<svg class="floral-corner-bl floral-pulse" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M10 10C15 25 25 35 40 40C55 45 70 45 85 40C70 55 65 75 65 95C65 115 70 135 85 145C70 140 50 145 35 160C20 175 10 190 10 190" stroke="#C9A84C" stroke-width="1.5" stroke-linecap="round" fill="none" opacity="0.6"/>
<circle cx="45" cy="45" r="8" fill="#C9A84C" opacity="0.3"/>
</svg>
<svg class="floral-corner-tr floral-float-slow" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M10 10C15 25 25 35 40 40C55 45 70 45 85 40C70 55 65 75 65 95C65 115 70 135 85 145C70 140 50 145 35 160C20 175 10 190 10 190" stroke="#C9A84C" stroke-width="1.5" stroke-linecap="round" fill="none" opacity="0.6"/>
<circle cx="45" cy="45" r="8" fill="#C9A84C" opacity="0.3"/>
</svg>
<div style="max-width:1200px;margin:0 auto;position:relative;z-index:2;">
<p class="section-subtitle" data-aos="fade-up">Momen Berharga</p>
<h2 class="section-title" data-aos="fade-up" data-aos-delay="100">Gallery</h2>
<div class="section-divider" data-aos="fade-up" data-aos-delay="150"><span>&#10022;</span></div>
@if($galleries->count() > 0)
<div style="display:grid;grid-template-columns:repeat(2,1fr);gap:0.5rem;" class="gallery-grid">
@foreach($galleries as $i => $photo)
<div class="gallery-item" data-src="{{ $photo->image }}"
     style="height:{{ $i % 5 === 0 ? '260px' : '180px' }};"
     data-aos="fade-up" data-aos-delay="{{ ($i % 6) * 50 }}">
<img src="{{ $photo->thumbnail ?? $photo->image }}" alt="Gallery {{ $i+1 }}" loading="lazy" style="width:100%;height:100%;object-fit:cover;">
<div class="gallery-overlay">
<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/><line x1="11" y1="8" x2="11" y2="14"/><line x1="8" y1="11" x2="14" y2="11"/></svg>
</div>
</div>
@endforeach
</div>
<style>@media(min-width:768px){.gallery-grid{grid-template-columns:repeat(3,1fr)!important;}}@media(min-width:1024px){.gallery-grid{grid-template-columns:repeat(4,1fr)!important;}}</style>
@else
<div style="text-align:center;padding:4rem;color:#888;">
<p style="font-style:italic;">Gallery foto akan segera hadir.</p>
</div>
@endif
</div>
</section>
