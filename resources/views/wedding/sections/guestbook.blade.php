<section id="guestbook" style="background-color:#FDFBF7;padding:5rem 1.5rem;position:relative;overflow:hidden;">
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
<p class="section-subtitle" data-aos="fade-up">Ucapan &amp; Doa</p>
<h2 class="section-title" data-aos="fade-up" data-aos-delay="100">Guestbook</h2>
<div class="section-divider" data-aos="fade-up" data-aos-delay="150"><span>&#10022;</span></div>

<!-- Form Card -->
<div style="max-width:600px;margin:0 auto 3rem;background:#FFFDF9;border:1px solid rgba(201,168,76,0.2);padding:2rem 1.5rem;border-radius:16px;box-shadow:0 8px 30px rgba(45,74,62,0.06);" data-aos="fade-up" data-aos-delay="200">
<form onsubmit="submitGuestbook(event,this)">
@csrf
<div style="margin-bottom:1.25rem;">
<label class="form-label">Nama *</label>
<input type="text" name="name" value="{{ $guestName }}" class="form-input" placeholder="Nama Anda" required maxlength="100">
</div>
<div style="margin-bottom:1.5rem;">
<label class="form-label">Ucapan &amp; Doa *</label>
<textarea name="message" class="form-input" rows="4" placeholder="Tuliskan ucapan dan doa terbaik Anda..." required maxlength="500" style="resize:none;min-height:auto;"></textarea>
</div>
<button type="submit" class="btn-gold" style="width:100%;">Send Message</button>
</form>
</div>

<!-- Guestbook Header Info & Counter -->
<div style="display:flex;align-items:center;justify-style:space-between;justify-content:space-between;max-width:600px;margin:0 auto 1rem;padding:0 0.25rem;" data-aos="fade-up" data-aos-delay="250">
<span style="font-size:0.825rem;font-weight:600;color:#2D4A3E;text-transform:uppercase;letter-spacing:0.08em;display:inline-flex;align-items:center;gap:0.4rem;">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#C9A84C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
Daftar Ucapan
</span>
<span style="background:rgba(201,168,76,0.12);color:#C9A84C;border:1px solid rgba(201,168,76,0.3);font-size:0.75rem;font-weight:600;padding:0.25rem 0.75rem;border-radius:50px;display:inline-flex;align-items:center;gap:0.3rem;">
<span id="guestbook-count">{{ count($guestbooks) }}</span> Pesan
</span>
</div>

<!-- Scrollable Guestbook Container -->
<div class="guestbook-scroll-container" id="guestbook-list" style="max-width:600px;margin:0 auto;" data-aos="fade-up" data-aos-delay="300">
@forelse($guestbooks as $entry)
<div class="guestbook-item">
<div style="display:flex;align-items:center;gap:0.75rem;margin-bottom:0.5rem;">
<div style="width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,#2D4A3E,#C9A84C);display:flex;align-items:center;justify-content:center;font-weight:600;color:white;font-size:1rem;flex-shrink:0;">
{{ strtoupper(substr($entry->name,0,1)) }}
</div>
<div>
<p style="font-weight:600;font-size:0.875rem;color:#2D4A3E;">{{ $entry->name }}</p>
<p style="font-size:0.7rem;color:#999;">{{ $entry->created_at->diffForHumans() }}</p>
</div>
</div>
<p style="font-size:0.875rem;color:#555;line-height:1.6;padding-left:clamp(1rem,6vw,3rem);">{{ $entry->message }}</p>
</div>
@empty
<div id="guestbook-empty" style="text-align:center;color:#999;font-style:italic;padding:2.5rem 1rem;background:#FFFDF9;border:1px dashed rgba(201,168,76,0.3);border-radius:12px;">
<p style="margin:0;">Belum ada ucapan. Jadilah yang pertama mengirimkan ucapan &amp; doa!</p>
</div>
@endforelse
</div>
</div>
</section>
