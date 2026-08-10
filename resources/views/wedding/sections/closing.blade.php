<section style="position:relative;background-color:#1F3530;padding:7rem 1.5rem;text-align:center;overflow:hidden;">
<div style="position:absolute;inset:0;"><img src="{{ $settings['closing_photo'] ?? '/images/placeholder-hero.jpg' }}" alt="" style="width:100%;height:100%;object-fit:cover;opacity:0.15;"></div>
<div style="position:absolute;inset:0;background:rgba(31,53,48,0.85);"></div>
<div style="position:relative;z-index:1;" data-aos="fade-up">
<p style="font-size:0.65rem;letter-spacing:0.4em;text-transform:uppercase;color:rgba(201,168,76,0.7);margin-bottom:1.5rem;">Thank You</p>
<h2 style="font-family:'Cormorant Garamond',Georgia,serif;font-size:clamp(2rem,6vw,4rem);color:white;font-weight:500;margin-bottom:1rem;">Thank You</h2>
<p style="font-family:'Cormorant Garamond',Georgia,serif;font-size:1.25rem;color:rgba(255,255,255,0.7);font-style:italic;margin-bottom:2rem;">For being part of our special day.</p>
<div style="display:flex;align-items:center;justify-content:center;gap:1rem;margin:2rem 0;">
<div style="height:1px;width:60px;background:linear-gradient(to right,transparent,#C9A84C);"></div>
<p style="font-size:0.75rem;letter-spacing:0.2em;color:#C9A84C;">With Love</p>
<div style="height:1px;width:60px;background:linear-gradient(to left,transparent,#C9A84C);"></div>
</div>
<h3 style="font-family:'Cormorant Garamond',Georgia,serif;font-size:clamp(2.5rem,8vw,4.5rem);color:white;font-weight:600;margin-bottom:0.5rem;">
{{ $settings['groom_nickname'] ?? 'Bowo' }} &amp; {{ $settings['bride_nickname'] ?? 'Riska' }}
</h3>
<p style="font-size:0.8rem;letter-spacing:0.3em;color:rgba(201,168,76,0.8);">{{ $settings['wedding_date'] ?? '16 Agustus 2026' }}</p>
</div>
</section>
<footer style="background-color:#132220;padding:2rem 1.5rem;text-align:center;">
<p style="font-family:'Cormorant Garamond',Georgia,serif;font-size:1.25rem;color:rgba(255,255,255,0.5);">{{ $settings['groom_nickname'] ?? 'Bowo' }} &amp; {{ $settings['bride_nickname'] ?? 'Riska' }}</p>
<p style="font-size:0.7rem;letter-spacing:0.2em;color:rgba(201,168,76,0.5);margin:0.25rem 0;">{{ $settings['wedding_date'] ?? '16.08.2026' }}</p>
<p style="font-size:0.7rem;color:rgba(255,255,255,0.3);margin-top:0.5rem;">Made with &#9829; Love</p>
</footer>
