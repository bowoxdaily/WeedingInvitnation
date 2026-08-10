<section id="hero" style="position:relative;min-height:100svh;display:flex;align-items:center;justify-content:center;overflow:hidden;background-color:#FAF6F0;">
<div style="position:absolute;inset:0;"><img src="{{ !empty($settings['hero_photo']) ? asset($settings['hero_photo']) : asset('images/placeholder-hero.jpg') }}" alt="" style="width:100%;height:100%;object-fit:cover;opacity:0.12;"></div>
<div style="position:absolute;inset:0;background:linear-gradient(to bottom,rgba(250,246,240,0.6),rgba(250,246,240,0.8) 60%,rgba(250,246,240,0.95));"></div>

<!-- Floating Particles -->
<div class="hero-particles" style="position:absolute;inset:0;pointer-events:none;overflow:hidden;">
<div class="particle" style="position:absolute;width:4px;height:4px;background:#C9A84C;border-radius:50%;top:20%;left:10%;opacity:0.6;animation:sparkle 4s ease-in-out infinite;"></div>
<div class="particle" style="position:absolute;width:3px;height:3px;background:#E8D08A;border-radius:50%;top:40%;left:80%;opacity:0.5;animation:sparkle 5s ease-in-out infinite 1s;"></div>
<div class="particle" style="position:absolute;width:5px;height:5px;background:#C9A84C;border-radius:50%;top:60%;left:15%;opacity:0.7;animation:sparkle 3s ease-in-out infinite 2s;"></div>
<div class="particle" style="position:absolute;width:3px;height:3px;background:#E8D08A;border-radius:50%;top:30%;right:20%;opacity:0.6;animation:sparkle 6s ease-in-out infinite 0.5s;"></div>
<div class="particle" style="position:absolute;width:4px;height:4px;background:#C9A84C;border-radius:50%;bottom:30%;right:15%;opacity:0.5;animation:sparkle 4.5s ease-in-out infinite 1.5s;"></div>
<div class="particle" style="position:absolute;width:3px;height:3px;background:#E8D08A;border-radius:50%;bottom:50%;left:25%;opacity:0.6;animation:sparkle 5.5s ease-in-out infinite 2.5s;"></div>
</div>

<!-- Floral Decoration Top Left -->
<svg class="floral-float" style="position:absolute;top:0;left:0;width:140px;height:140px;opacity:0.6;pointer-events:none;" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
<path d="M10,10 Q30,40 50,35 T80,50" stroke="#C9A84C" stroke-width="2" fill="none" opacity="0.7"/>
<path d="M10,10 Q25,25 40,45 T70,80" stroke="#C9A84C" stroke-width="1.5" fill="none" opacity="0.6"/>
<circle cx="50" cy="35" r="4" fill="#C9A84C" opacity="0.8"/>
<circle cx="80" cy="50" r="3" fill="#C9A84C" opacity="0.7"/>
<circle cx="40" cy="45" r="3.5" fill="#C9A84C" opacity="0.75"/>
<circle cx="70" cy="80" r="3" fill="#C9A84C" opacity="0.7"/>
</svg>

<!-- Floral Decoration Top Right -->
<svg class="floral-float-slow" style="position:absolute;top:0;right:0;width:140px;height:140px;opacity:0.6;pointer-events:none;" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
<path d="M190,10 Q170,40 150,35 T120,50" stroke="#C9A84C" stroke-width="2" fill="none" opacity="0.7"/>
<path d="M190,10 Q175,25 160,45 T130,80" stroke="#C9A84C" stroke-width="1.5" fill="none" opacity="0.6"/>
<circle cx="150" cy="35" r="4" fill="#C9A84C" opacity="0.8"/>
<circle cx="120" cy="50" r="3" fill="#C9A84C" opacity="0.7"/>
<circle cx="160" cy="45" r="3.5" fill="#C9A84C" opacity="0.75"/>
<circle cx="130" cy="80" r="3" fill="#C9A84C" opacity="0.7"/>
</svg>

<!-- Floral Decoration Bottom Left -->
<svg class="floral-pulse floral-float" style="position:absolute;bottom:0;left:0;width:140px;height:140px;opacity:0.6;pointer-events:none;" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
<path d="M10,190 Q30,160 50,165 T80,150" stroke="#C9A84C" stroke-width="2" fill="none" opacity="0.7"/>
<path d="M10,190 Q25,175 40,155 T70,120" stroke="#C9A84C" stroke-width="1.5" fill="none" opacity="0.6"/>
<circle cx="50" cy="165" r="4" fill="#C9A84C" opacity="0.8"/>
<circle cx="80" cy="150" r="3" fill="#C9A84C" opacity="0.7"/>
<circle cx="40" cy="155" r="3.5" fill="#C9A84C" opacity="0.75"/>
<circle cx="70" cy="120" r="3" fill="#C9A84C" opacity="0.7"/>
</svg>

<!-- Floral Decoration Bottom Right -->
<svg class="floral-float-slow" style="position:absolute;bottom:0;right:0;width:140px;height:140px;opacity:0.6;pointer-events:none;" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
<path d="M190,190 Q170,160 150,165 T120,150" stroke="#C9A84C" stroke-width="2" fill="none" opacity="0.7"/>
<path d="M190,190 Q175,175 160,155 T130,120" stroke="#C9A84C" stroke-width="1.5" fill="none" opacity="0.6"/>
<circle cx="150" cy="165" r="4" fill="#C9A84C" opacity="0.8"/>
<circle cx="120" cy="150" r="3" fill="#C9A84C" opacity="0.7"/>
<circle cx="160" cy="155" r="3.5" fill="#C9A84C" opacity="0.75"/>
<circle cx="130" cy="120" r="3" fill="#C9A84C" opacity="0.7"/>
</svg>

<div style="position:relative;z-index:1;text-align:center;padding:2rem 1.5rem;" data-aos="fade-up" data-aos-duration="1200">
<p style="font-size:0.7rem;letter-spacing:0.4em;text-transform:uppercase;color:#6B9568;margin-bottom:1.5rem;animation:fadeInDown 1s ease-out;" class="animate-delay-100">The Wedding Of</p>
<h2 style="font-family:'Cormorant Garamond',Georgia,serif;font-size:clamp(4rem,15vw,8rem);font-weight:600;color:#2D4A3E;line-height:0.85;margin:0;animation:scaleIn 1.2s ease-out;" class="animate-delay-200">{{ $settings['groom_nickname'] ?? 'Bowo' }}</h2>
<p style="font-family:'Cormorant Garamond',Georgia,serif;font-size:clamp(2rem,6vw,3.5rem);color:#C9A84C;font-style:italic;margin:0.5rem 0;animation:scaleIn 1s ease-out;" class="animate-delay-300 shimmer-effect">&amp;</p>
<h2 style="font-family:'Cormorant Garamond',Georgia,serif;font-size:clamp(4rem,15vw,8rem);font-weight:600;color:#2D4A3E;line-height:0.85;margin:0;animation:scaleIn 1.2s ease-out;" class="animate-delay-400">{{ $settings['bride_nickname'] ?? 'Riska' }}</h2>
<div style="display:flex;align-items:center;justify-content:center;gap:1rem;margin:2rem 0 1rem;animation:fadeInUp 1s ease-out;" class="animate-delay-500">
<div style="height:1px;width:60px;background:linear-gradient(to right,transparent,#C9A84C);"></div>
<p style="font-size:0.75rem;letter-spacing:0.3em;color:#C9A84C;">{{ $settings['wedding_date_en'] ?? '16 August 2026' }}</p>
<div style="height:1px;width:60px;background:linear-gradient(to left,transparent,#C9A84C);"></div>
</div>
<p style="font-size:0.875rem;color:#6B9568;font-style:italic;margin-bottom:3rem;animation:fadeInUp 1s ease-out;" class="animate-delay-500">We are getting married</p>
</div>

<style>
@media (min-width: 768px) {
    #hero svg { width: 200px !important; height: 200px !important; }
}
</style>
</section>
