<section id="rsvp" style="background:linear-gradient(135deg,#1F3530,#2D4A3E);padding:5rem 1.5rem;">
<div class="container-wedding">
<p class="section-subtitle" style="color:rgba(201,168,76,0.8);" data-aos="fade-up">Konfirmasi Kehadiran</p>
<h2 style="font-family:'Cormorant Garamond',Georgia,serif;font-size:clamp(2rem,6vw,3.5rem);color:white;text-align:center;margin-bottom:0.5rem;" data-aos="fade-up" data-aos-delay="100">RSVP</h2>
<div style="display:flex;align-items:center;justify-content:center;gap:1rem;margin:1.5rem auto 3rem;" data-aos="fade-up" data-aos-delay="150">
<div style="height:1px;width:60px;background:linear-gradient(to right,transparent,rgba(201,168,76,0.6));"></div>
<span style="color:#C9A84C;">&#10022;</span>
<div style="height:1px;width:60px;background:linear-gradient(to left,transparent,rgba(201,168,76,0.6));"></div>
</div>
<div style="max-width:500px;margin:0 auto;background:rgba(255,255,255,0.05);border:1px solid rgba(201,168,76,0.2);padding:2rem 1.5rem;" data-aos="fade-up" data-aos-delay="200">
<form onsubmit="submitRsvp(event,this)">
@csrf
<div style="margin-bottom:1.25rem;">
<label class="form-label" style="color:rgba(255,255,255,0.7);">Nama Lengkap *</label>
<input type="text" name="name" value="{{ $guestName !== 'Tamu Undangan' ? $guestName : '' }}" class="form-input" placeholder="Nama Anda" required maxlength="100" style="background:rgba(255,255,255,0.07);border-color:rgba(201,168,76,0.3);color:white;">
</div>
<div style="margin-bottom:1.25rem;">
<label class="form-label" style="color:rgba(255,255,255,0.7);">Konfirmasi Kehadiran *</label>
<div style="display:grid;grid-template-columns:repeat(3,1fr);gap:0.5rem;">
<label style="cursor:pointer;">
<input type="radio" name="attendance_status" value="hadir" checked style="display:none;" class="rsvp-r">
<div class="rsvp-opt" style="padding:0.75rem 0.25rem;border:1px solid rgba(201,168,76,0.3);text-align:center;font-size:0.75rem;transition:all 0.2s;min-height:48px;display:flex;align-items:center;justify-content:center;background:#C9A84C;color:#1F3530;font-weight:600;border-radius:4px;">✓ Hadir</div>
</label>
<label style="cursor:pointer;">
<input type="radio" name="attendance_status" value="tidak_hadir" style="display:none;" class="rsvp-r">
<div class="rsvp-opt" style="padding:0.75rem 0.25rem;border:1px solid rgba(201,168,76,0.3);text-align:center;font-size:0.75rem;color:rgba(255,255,255,0.7);transition:all 0.2s;min-height:48px;display:flex;align-items:center;justify-content:center;border-radius:4px;">✗ Tidak Hadir</div>
</label>
<label style="cursor:pointer;">
<input type="radio" name="attendance_status" value="belum_pasti" style="display:none;" class="rsvp-r">
<div class="rsvp-opt" style="padding:0.75rem 0.25rem;border:1px solid rgba(201,168,76,0.3);text-align:center;font-size:0.75rem;color:rgba(255,255,255,0.7);transition:all 0.2s;min-height:48px;display:flex;align-items:center;justify-content:center;border-radius:4px;">? Belum Pasti</div>
</label>
</div>
</div>
<div style="margin-bottom:1.25rem;">
<label class="form-label" style="color:rgba(255,255,255,0.7);">Jumlah Tamu *</label>
<select name="guest_count" class="form-input" required style="background:rgba(255,255,255,0.07);border-color:rgba(201,168,76,0.3);color:white;">
@for($i=1;$i<=5;$i++)<option value="{{ $i }}" style="background:#2D4A3E;">{{ $i }} orang</option>@endfor
</select>
</div>
<div style="margin-bottom:1.5rem;">
<label class="form-label" style="color:rgba(255,255,255,0.7);">Pesan (Opsional)</label>
<textarea name="message" class="form-input" rows="3" placeholder="Tulis pesan untuk pengantin..." maxlength="500" style="background:rgba(255,255,255,0.07);border-color:rgba(201,168,76,0.3);color:white;resize:none;min-height:auto;"></textarea>
</div>
<button type="submit" class="btn-gold" style="width:100%;">Send RSVP</button>
</form>
</div>
</div>
</section>
<script>
document.addEventListener('DOMContentLoaded',function(){
document.querySelectorAll('.rsvp-r').forEach(function(r){
r.closest('label').addEventListener('click',function(){
document.querySelectorAll('.rsvp-opt').forEach(function(o){o.style.background='transparent';o.style.color='rgba(255,255,255,0.7)';o.style.fontWeight='normal';});
this.querySelector('.rsvp-opt').style.background='#C9A84C';
this.querySelector('.rsvp-opt').style.color='#1F3530';
this.querySelector('.rsvp-opt').style.fontWeight='600';
});
});
});
</script>
