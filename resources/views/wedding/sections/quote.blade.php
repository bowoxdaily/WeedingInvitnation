<section style="background-color:#FDFBF7;padding:5rem 1.5rem;text-align:center;position:relative;overflow:hidden;">
<!-- Floral Decorations -->
<svg class="floral-corner-tl floral-float" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M10 10C15 25 25 35 40 40C55 45 70 45 85 40C70 55 65 75 65 95C65 115 70 135 85 145C70 140 50 145 35 160C20 175 10 190 10 190" stroke="#C9A84C" stroke-width="1.5" stroke-linecap="round" fill="none" opacity="0.6"/>
<circle cx="45" cy="45" r="8" fill="#C9A84C" opacity="0.3"/>
<circle cx="25" cy="70" r="6" fill="#E8D08A" opacity="0.4"/>
</svg>
<svg class="floral-corner-tr floral-float-slow" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M10 10C15 25 25 35 40 40C55 45 70 45 85 40C70 55 65 75 65 95C65 115 70 135 85 145C70 140 50 145 35 160C20 175 10 190 10 190" stroke="#C9A84C" stroke-width="1.5" stroke-linecap="round" fill="none" opacity="0.6"/>
<circle cx="45" cy="45" r="8" fill="#C9A84C" opacity="0.3"/>
</svg>
<div class="container-wedding" data-aos="zoom-in">
<div style="color:#C9A84C;font-size:3rem;font-family:Georgia,serif;line-height:0.5;opacity:0.4;">"</div>
<blockquote style="font-family:'Cormorant Garamond',Georgia,serif;font-size:clamp(1.3rem,3vw,2rem);color:#2D4A3E;font-style:italic;line-height:1.6;margin:1rem auto;max-width:600px;">
{{ $settings['wedding_quote'] ?? 'A beautiful journey begins with two hearts choosing one path together.' }}
</blockquote>
<div style="color:#C9A84C;font-size:3rem;font-family:Georgia,serif;line-height:0.5;opacity:0.4;transform:rotate(180deg);display:inline-block;">"</div>
@if(!empty($settings['wedding_quote_source']))
<p style="font-size:0.75rem;letter-spacing:0.2em;color:#C9A84C;margin-top:1rem;">— {{ $settings['wedding_quote_source'] }}</p>
@endif
</div>
</section>