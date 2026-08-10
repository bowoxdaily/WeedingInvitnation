<?php
$base = ''D:/Project/weedding_invination/resources/views/wedding'';
function w($path, $content) {
    @mkdir(dirname($path), 0755, true);
    file_put_contents($path, $content);
    echo "OK: " . basename($path) . "\n";
}

// HERO SECTION
w("$base/sections/hero.blade.php",
''<section id="hero" style="position:relative;min-height:100svh;display:flex;align-items:center;justify-content:center;overflow:hidden;background-color:#1F3530;">
<div style="position:absolute;inset:0;"><img src="{{ $settings[\x27hero_photo\x27] ?? \'\' }}" alt="" style="width:100%;height:100%;object-fit:cover;opacity:0.4;"></div>
<div style="position:absolute;inset:0;background:linear-gradient(to bottom,rgba(31,53,48,0.3),rgba(31,53,48,0.6) 60%,rgba(31,53,48,0.9));"></div>
<div style="position:relative;z-index:1;text-align:center;padding:2rem 1.5rem;" data-aos="fade-up">
<p style="font-size:0.7rem;letter-spacing:0.4em;text-transform:uppercase;color:rgba(255,255,255,0.7);margin-bottom:1.5rem;">The Wedding Of</p>
<h2 style="font-family:\x27Cormorant Garamond\x27,Georgia,serif;font-size:clamp(4rem,15vw,8rem);font-weight:600;color:white;line-height:0.85;margin:0;">{{ $settings[\x27groom_nickname\x27] ?? \x27Bowo\x27 }}</h2>
<p style="font-family:\x27Cormorant Garamond\x27,Georgia,serif;font-size:clamp(2rem,6vw,3.5rem);color:#C9A84C;font-style:italic;margin:0.5rem 0;">&amp;</p>
<h2 style="font-family:\x27Cormorant Garamond\x27,Georgia,serif;font-size:clamp(4rem,15vw,8rem);font-weight:600;color:white;line-height:0.85;margin:0;">{{ $settings[\x27bride_nickname\x27] ?? \x27Riska\x27 }}</h2>
<div style="display:flex;align-items:center;justify-content:center;gap:1rem;margin:2rem 0 1rem;">
<div style="height:1px;width:60px;background:linear-gradient(to right,transparent,#C9A84C);"></div>
<p style="font-size:0.75rem;letter-spacing:0.3em;color:#C9A84C;">{{ $settings[\x27wedding_date_en\x27] ?? \x2716 August 2026\x27 }}</p>
<div style="height:1px;width:60px;background:linear-gradient(to left,transparent,#C9A84C);"></div>
</div>
<p style="font-size:0.875rem;color:rgba(255,255,255,0.6);font-style:italic;margin-bottom:3rem;">We are getting married</p>
</div>
<div style="position:absolute;bottom:2rem;left:50%;transform:translateX(-50%);z-index:1;display:flex;flex-direction:column;align-items:center;gap:0.5rem;animation:boun 2s infinite;">
<p style="font-size:0.625rem;letter-spacing:0.3em;color:rgba(255,255,255,0.5);">SCROLL</p>
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="rgba(201,168,76,0.7)" stroke-width="2"><path d="M12 5v14M19 12l-7 7-7-7"/></svg>
</div>
<style>@keyframes boun{0%,100%{transform:translateX(-50%) translateY(0);}50%{transform:translateX(-50%) translateY(8px);}}</style>
</section>''
);

echo "Hero done\n";
?>
