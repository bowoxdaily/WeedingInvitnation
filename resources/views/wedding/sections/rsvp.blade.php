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
<div style="display:flex;flex-direction:column;gap:0.75rem;">
    <button type="submit" name="submit_action" value="site" onclick="this.form.dataset.wa = '0';" class="btn-gold" style="width:100%;justify-content:center;">
        Simpan RSVP
    </button>
    <button type="submit" name="submit_action" value="wa" onclick="this.form.dataset.wa = '1';" style="width:100%;background:linear-gradient(135deg, #1C4D3B 0%, #28835A 50%, #1C4D3B 100%);color:#FFFDF9;border:1.5px solid rgba(201, 168, 76, 0.5);padding:0.85rem 1.25rem;border-radius:9999px;font-weight:600;font-size:0.85rem;cursor:pointer;display:inline-flex;align-items:center;justify-content:center;gap:0.6rem;transition:all 0.3s cubic-bezier(0.4, 0, 0.2, 1);box-shadow:0 4px 18px rgba(28, 77, 59, 0.4);letter-spacing:0.08em;text-transform:uppercase;min-height:48px;" onmouseover="this.style.background='linear-gradient(135deg, #28835A 0%, #1C4D3B 50%, #28835A 100%)';this.style.borderColor='#C9A84C';this.style.transform='translateY(-2px)';this.style.boxShadow='0 6px 22px rgba(201, 168, 76, 0.35)'" onmouseout="this.style.background='linear-gradient(135deg, #1C4D3B 0%, #28835A 50%, #1C4D3B 100%)';this.style.borderColor='rgba(201, 168, 76, 0.5)';this.style.transform='none';this.style.boxShadow='0 4px 18px rgba(28, 77, 59, 0.4)'">
        <span style="width:24px;height:24px;border-radius:50%;background:linear-gradient(135deg, #C9A84C, #E8D08A);display:inline-flex;align-items:center;justify-content:center;color:#1C4D3B;flex-shrink:0;box-shadow:0 2px 6px rgba(0,0,0,0.2);">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.384-.326-.333-.445-.339l-.379-.007c-.133 0-.347.05-.529.248-.182.198-.696.68-.696 1.657 0 .977.71 1.92 8.09 2.022.099.102 1.64.673 2.87 1.09 1.23.418 1.48.297 1.745.264.265-.034.85-.347 1.005-.68.156-.332.156-.618.11-.68-.046-.065-.178-.1-.375-.198z"/>
            </svg>
        </span>
        Kirim &amp; Konfirmasi WA
    </button>
</div>
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
