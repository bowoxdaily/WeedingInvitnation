<div id="cover-page" 
     x-show="!isOpen" 
     x-transition:leave="transition ease-in-out duration-1000 transform"
     x-transition:leave-start="translate-y-0 opacity-100 scale-100"
     x-transition:leave-end="-translate-y-full opacity-90 scale-95"
     style="position:fixed;inset:0;z-index:50;display:flex;align-items:center;justify-content:center;background:#FAF6F0;overflow:hidden;min-height:100vh;will-change:transform,opacity;">
<div style="position:absolute;inset:0;"><img src="{{ !empty($settings['hero_photo']) ? asset($settings['hero_photo']) : asset('images/placeholder-hero.jpg') }}" alt="" style="width:100%;height:100%;object-fit:cover;opacity:0.15;"></div>
<div style="position:absolute;inset:0;background:linear-gradient(to bottom,rgba(250,246,240,0.7),rgba(250,246,240,0.9));"></div>
<div style="position:relative;z-index:1;text-align:center;padding:2rem 1.5rem;max-width:480px;margin:0 auto;width:100%;">
<p style="color:#C9A84C;font-size:1.5rem;margin-bottom:1.5rem;">&#10022;</p>
<p style="font-size:0.7rem;letter-spacing:0.35em;text-transform:uppercase;color:#6B9568;margin-bottom:1rem;">The Wedding Of</p>
<h1 style="font-family:'Cormorant Garamond',Georgia,serif;font-size:clamp(3.5rem,12vw,6rem);font-weight:600;color:#2D4A3E;line-height:0.9;margin-bottom:0.5rem;">
<span style="color:#2D4A3E;">{{ $settings['groom_nickname'] ?? 'Bowo' }}</span>
<span style="display:block;font-size:clamp(1.5rem,5vw,2rem);color:#C9A84C;font-style:italic;margin:0.5rem 0;">&amp;</span>
<span style="color:#2D4A3E;">{{ $settings['bride_nickname'] ?? 'Riska' }}</span>
</h1>
<div style="display:flex;align-items:center;justify-content:center;gap:0.75rem;margin:1.5rem 0;">
<div style="height:1px;width:50px;background:linear-gradient(to right,transparent,#C9A84C);"></div>
<p style="font-size:0.75rem;letter-spacing:0.25em;color:#C9A84C;">{{ $settings['wedding_date'] ?? '16 Agustus 2026' }}</p>
<div style="height:1px;width:50px;background:linear-gradient(to left,transparent,#C9A84C);"></div>
</div>

<div style="margin:1.5rem 0;padding:1rem;border:1px solid rgba(201,168,76,0.3);background:#FFFDF9;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,0.05);">
<p style="font-size:0.65rem;letter-spacing:0.2em;text-transform:uppercase;color:#6B9568;margin-bottom:0.5rem;">Kepada Yth.</p>
<p style="font-family:'Cormorant Garamond',Georgia,serif;font-size:1.5rem;color:#2D4A3E;font-style:italic;">{{ $guestName }}</p>
</div>

<button @click="openInvitation()" class="btn-gold" style="width:100%;max-width:280px;margin:0 auto;display:flex;justify-content:center;">Open Invitation</button>
<p style="color:#C9A84C;font-size:1.5rem;margin-top:1.5rem;">&#10022;</p>
</div>
</div>
