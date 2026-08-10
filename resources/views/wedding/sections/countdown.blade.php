<section id="countdown" style="background:linear-gradient(135deg,#1F3530,#2D4A3E);padding:5rem 1.5rem;text-align:center;position:relative;overflow:hidden;">
<div style="position:absolute;inset:0;opacity:0.03;background-image:radial-gradient(circle,#C9A84C 1px,transparent 1px);background-size:30px 30px;"></div>
<div class="container-wedding" style="position:relative;">
<p class="section-subtitle" style="color:rgba(201,168,76,0.8);" data-aos="fade-up">Menuju Hari Istimewa</p>
<h2 style="font-family:'Cormorant Garamond',Georgia,serif;font-size:clamp(2rem,6vw,3.5rem);color:white;margin-bottom:3rem;" data-aos="fade-up" data-aos-delay="100">Countdown</h2>
<div id="countdown" data-target-date="{{ $settings['wedding_date_iso'] ?? '2026-08-16T08:00:00' }}" style="display:flex;justify-content:center;gap:1rem;flex-wrap:wrap;" data-aos="fade-up" data-aos-delay="200">
<div class="countdown-box" style="background:rgba(255,255,255,0.05);border:1px solid rgba(201,168,76,0.3);padding:1.5rem 1rem;">
<span id="cd-days" class="countdown-number" style="color:white;">00</span><span class="countdown-label">Days</span>
</div>
<div style="display:flex;align-items:center;font-family:'Cormorant Garamond',serif;font-size:3rem;color:#C9A84C;padding-bottom:1.5rem;">:</div>
<div class="countdown-box" style="background:rgba(255,255,255,0.05);border:1px solid rgba(201,168,76,0.3);padding:1.5rem 1rem;">
<span id="cd-hours" class="countdown-number" style="color:white;">00</span><span class="countdown-label">Hours</span>
</div>
<div style="display:flex;align-items:center;font-family:'Cormorant Garamond',serif;font-size:3rem;color:#C9A84C;padding-bottom:1.5rem;">:</div>
<div class="countdown-box" style="background:rgba(255,255,255,0.05);border:1px solid rgba(201,168,76,0.3);padding:1.5rem 1rem;">
<span id="cd-minutes" class="countdown-number" style="color:white;">00</span><span class="countdown-label">Minutes</span>
</div>
<div style="display:flex;align-items:center;font-family:'Cormorant Garamond',serif;font-size:3rem;color:#C9A84C;padding-bottom:1.5rem;">:</div>
<div class="countdown-box" style="background:rgba(255,255,255,0.05);border:1px solid rgba(201,168,76,0.3);padding:1.5rem 1rem;">
<span id="cd-seconds" class="countdown-number" style="color:white;">00</span><span class="countdown-label">Seconds</span>
</div>
</div>
<div id="countdown-thankyou" style="display:none;color:white;">
<p style="font-family:'Cormorant Garamond',Georgia,serif;font-size:2rem;font-style:italic;">Thank You For Being Part of Our Special Day!</p>
</div>
<button onclick="addToGoogleCalendar()" class="btn-outline-gold" style="margin-top:3rem;border-color:rgba(201,168,76,0.6);color:#C9A84C;" data-aos="fade-up" data-aos-delay="300">
Add to Google Calendar
</button>
</div>
</section>
