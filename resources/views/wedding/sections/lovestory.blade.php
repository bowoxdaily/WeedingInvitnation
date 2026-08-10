<section id="lovestory" style="background-color:#FAF6F0;padding:5rem 1.5rem;position:relative;overflow:hidden;">
<!-- Floral Corner Decorations -->
<svg class="floral-corner-bl floral-pulse" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M10 10C15 25 25 35 40 40C55 45 70 45 85 40C70 55 65 75 65 95C65 115 70 135 85 145C70 140 50 145 35 160C20 175 10 190 10 190" stroke="#C9A84C" stroke-width="1.5" stroke-linecap="round" fill="none" opacity="0.6"/>
<circle cx="45" cy="45" r="8" fill="#C9A84C" opacity="0.3"/>
</svg>
<svg class="floral-corner-tr floral-float-slow" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M10 10C15 25 25 35 40 40C55 45 70 45 85 40C70 55 65 75 65 95C65 115 70 135 85 145C70 140 50 145 35 160C20 175 10 190 10 190" stroke="#C9A84C" stroke-width="1.5" stroke-linecap="round" fill="none" opacity="0.6"/>
<circle cx="45" cy="45" r="8" fill="#C9A84C" opacity="0.3"/>
</svg>
<div class="container-wedding">
<p class="section-subtitle" data-aos="fade-up">Perjalanan Cinta</p>
<h2 class="section-title" data-aos="fade-up" data-aos-delay="100">Love Story</h2>
<div class="section-divider" data-aos="fade-up" data-aos-delay="150"><span>&#10022;</span></div>
@if(!empty($loveStory))
<div style="position:relative;max-width:600px;margin:0 auto;">
<div style="position:absolute;left:20px;top:0;bottom:0;width:1px;background:linear-gradient(to bottom,transparent,rgba(201,168,76,0.3),transparent);"></div>
@foreach($loveStory as $index => $story)
<div style="position:relative;padding-left:60px;margin-bottom:2.5rem;">
<div style="position:absolute;left:12px;top:4px;width:16px;height:16px;border-radius:50%;background:#C9A84C;border:3px solid #FAF6F0;box-shadow:0 0 0 2px #C9A84C;"></div>
<div style="background:white;border:1px solid rgba(201,168,76,0.3);padding:1.5rem;box-shadow:0 4px 15px rgba(0,0,0,0.04);border-radius:12px;background:#FFFDF9;" data-aos="fade-right" data-aos-delay="{{ $index * 100 }}">
<p style="font-size:0.65rem;letter-spacing:0.25em;text-transform:uppercase;color:#C9A84C;margin-bottom:0.5rem;">{{ $story['year'] ?? '' }}</p>
<h4 style="font-family:'Cormorant Garamond',Georgia,serif;font-size:1.25rem;color:#2D4A3E;margin-bottom:0.5rem;">{{ $story['title'] ?? '' }}</h4>
<p style="font-size:0.875rem;color:#666;line-height:1.6;">{{ $story['description'] ?? '' }}</p>
</div>
</div>
@endforeach
</div>
@else
<p style="text-align:center;color:#999;font-style:italic;">Love story coming soon...</p>
@endif
</div>
</section>
