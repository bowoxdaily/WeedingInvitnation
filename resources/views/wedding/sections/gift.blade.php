<section id="gift" style="background-color:#FAF6F0;padding:5rem 1.5rem;position:relative;overflow:hidden;">
<!-- Floral Corner Decorations -->
<svg class="floral-corner-tl floral-float" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M10 10C15 25 25 35 40 40C55 45 70 45 85 40C70 55 65 75 65 95C65 115 70 135 85 145C70 140 50 145 35 160C20 175 10 190 10 190" stroke="#C9A84C" stroke-width="1.5" stroke-linecap="round" fill="none" opacity="0.6"/>
<circle cx="45" cy="45" r="8" fill="#C9A84C" opacity="0.3"/>
</svg>
<svg class="floral-corner-br floral-float" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M10 10C15 25 25 35 40 40C55 45 70 45 85 40C70 55 65 75 65 95C65 115 70 135 85 145C70 140 50 145 35 160C20 175 10 190 10 190" stroke="#C9A84C" stroke-width="1.5" stroke-linecap="round" fill="none" opacity="0.6"/>
<circle cx="45" cy="45" r="8" fill="#C9A84C" opacity="0.3"/>
</svg>
<div class="container-wedding">
<p class="section-subtitle" data-aos="fade-up">Hadiah Digital</p>
<h2 class="section-title" data-aos="fade-up" data-aos-delay="100">Wedding Gift</h2>
<div class="section-divider" data-aos="fade-up" data-aos-delay="150"><span>&#10022;</span></div>
<p style="text-align:center;color:#666;font-size:0.9rem;max-width:400px;margin:0 auto 3rem;font-style:italic;" data-aos="fade-up" data-aos-delay="200">
The greatest gift is your presence. But if you wish to send a gift:
</p>
<div style="display:grid;grid-template-columns:1fr;gap:1.5rem;max-width:700px;margin:0 auto;" class="gift-grid">
@if(!empty($settings['bank1_account_number']))
<div class="gift-card" data-aos="fade-up" data-aos-delay="250">
<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1rem;flex-wrap:wrap;gap:0.5rem;">
<p style="font-size:0.65rem;letter-spacing:0.2em;text-transform:uppercase;color:#C9A84C;">Bank Transfer</p>
<span style="background:#E8EFE7;color:#2D4A3E;font-size:0.75rem;font-weight:600;padding:0.25rem 0.75rem;">{{ $settings['bank1_name'] ?? 'BCA' }}</span>
</div>
<p style="font-family:'Cormorant Garamond',Georgia,serif;font-size:2rem;font-weight:600;color:#2D4A3E;letter-spacing:0.05em;margin-bottom:0.25rem;">{{ $settings['bank1_account_number'] }}</p>
<p style="font-size:0.8rem;color:#888;margin-bottom:1.25rem;">a.n. {{ $settings['bank1_account_name'] ?? '' }}</p>
<button class="btn-forest" style="width:100%;font-size:0.75rem;padding:0.75rem;" data-copy="{{ $settings['bank1_account_number'] }}">Copy Account Number</button>
</div>
@endif
@if(!empty($settings['bank2_account_number']))
<div class="gift-card" data-aos="fade-up" data-aos-delay="300">
<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1rem;flex-wrap:wrap;gap:0.5rem;">
<p style="font-size:0.65rem;letter-spacing:0.2em;text-transform:uppercase;color:#C9A84C;">Bank Transfer</p>
<span style="background:#E8EFE7;color:#2D4A3E;font-size:0.75rem;font-weight:600;padding:0.25rem 0.75rem;">{{ $settings['bank2_name'] ?? 'Mandiri' }}</span>
</div>
<p style="font-family:'Cormorant Garamond',Georgia,serif;font-size:2rem;font-weight:600;color:#2D4A3E;letter-spacing:0.05em;margin-bottom:0.25rem;">{{ $settings['bank2_account_number'] }}</p>
<p style="font-size:0.8rem;color:#888;margin-bottom:1.25rem;">a.n. {{ $settings['bank2_account_name'] ?? '' }}</p>
<button class="btn-forest" style="width:100%;font-size:0.75rem;padding:0.75rem;" data-copy="{{ $settings['bank2_account_number'] }}">Copy Account Number</button>
</div>
@endif
@if(!empty($settings['qris_image']))
<div class="gift-card" data-aos="fade-up" data-aos-delay="350" style="grid-column: 1 / -1; max-width: 360px; margin: 0 auto; width: 100%;">
<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1rem;flex-wrap:wrap;gap:0.5rem;">
<p style="font-size:0.65rem;letter-spacing:0.2em;text-transform:uppercase;color:#C9A84C;">QRIS Payment</p>
<span style="background:#FFF8E7;color:#C9A84C;font-size:0.75rem;font-weight:600;padding:0.25rem 0.75rem;">All E-Wallet</span>
</div>
<div style="text-align:center;margin-bottom:1rem;">
<img src="{{ asset($settings['qris_image']) }}" alt="QRIS Code" style="max-width:180px;width:100%;height:auto;border-radius:8px;border:1px solid #eee;padding:4px;background:white;margin:0 auto;display:block;">
</div>
<a href="{{ asset($settings['qris_image']) }}" download="QRIS-Gift.jpg" target="_blank" class="btn-forest" style="width:100%;font-size:0.75rem;padding:0.75rem;text-align:center;text-decoration:none;display:block;">Download QRIS Barcode</a>
</div>
@endif
</div>
<style>@media(min-width:640px){.gift-grid{grid-template-columns:1fr 1fr!important;}}</style>
</div>
</section>
