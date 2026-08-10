import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

document.addEventListener('DOMContentLoaded', function () {
    initAOS();
    initCountdown();
    initGallery();
    initCopyToClipboard();
    initParticles();
    initScrollProgressAndBackToTop();
    initPetalsCanvas();
    initGoldDustTrail();
    initMusicBadge();
});

// Custom Intersection Observer for bidirectional AOS animations (scroll up & down)
function initAOS() {
    if (!document.getElementById('aos-custom-styles')) {
        const style = document.createElement('style');
        style.id = 'aos-custom-styles';
        style.textContent = `
            [data-aos] {
                opacity: 0;
                transition-property: transform, opacity;
                transition-timing-function: cubic-bezier(0.22, 1, 0.36, 1);
                will-change: transform, opacity;
            }
            [data-aos="fade-up"] { transform: translateY(40px); }
            [data-aos="fade-down"] { transform: translateY(-40px); }
            [data-aos="fade-left"] { transform: translateX(40px); }
            [data-aos="fade-right"] { transform: translateX(-40px); }
            [data-aos="zoom-in"] { transform: scale(0.9); }
            [data-aos="zoom-out"] { transform: scale(1.08); }
            [data-aos].aos-animate {
                opacity: 1 !important;
                transform: translate(0, 0) scale(1) !important;
            }
        `;
        document.head.appendChild(style);
    }

    const elements = document.querySelectorAll('[data-aos]');
    if (!elements.length) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            const el = entry.target;
            const delay = parseInt(el.dataset.aosDelay || 0, 10);
            const duration = parseInt(el.dataset.aosDuration || 700, 10);
            
            if (entry.isIntersecting) {
                el.style.transitionDuration = `${duration}ms`;
                el.style.transitionDelay = `${delay}ms`;
                el.classList.add('aos-animate');
            } else {
                // Re-trigger animation when scrolling back up or down out of view
                el.style.transitionDuration = '400ms';
                el.style.transitionDelay = '0ms';
                el.classList.remove('aos-animate');
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -30px 0px'
    });

    elements.forEach((el) => observer.observe(el));
}

// Sparkle/Particle background generator
function initParticles() {
    const container = document.getElementById('particles-js');
    if (!container) return;

    const particleCount = window.innerWidth < 768 ? 15 : 30;
    for (let i = 0; i < particleCount; i++) {
        const particle = document.createElement('div');
        particle.className = 'particle';
        const size = Math.random() * 4 + 2;
        particle.style.width = `${size}px`;
        particle.style.height = `${size}px`;
        particle.style.left = `${Math.random() * 100}%`;
        particle.style.top = `${Math.random() * 100}%`;
        particle.style.animationDuration = `${Math.random() * 10 + 8}s`;
        particle.style.animationDelay = `${Math.random() * 5}s`;
        container.appendChild(particle);
    }
}

// Countdown logic
function initCountdown() {
    const el = document.getElementById('countdown');
    if (!el) return;

    const targetDateStr = el.dataset.targetDate || '2026-08-16T08:00:00';
    const targetDate = new Date(targetDateStr).getTime();

    function update() {
        const now = new Date().getTime();
        const difference = targetDate - now;

        const daysEl = document.getElementById('cd-days');
        const hoursEl = document.getElementById('cd-hours');
        const minsEl = document.getElementById('cd-minutes');
        const secsEl = document.getElementById('cd-seconds');
        const thankYouEl = document.getElementById('countdown-thankyou');

        if (difference <= 0) {
            if (el) el.style.display = 'none';
            if (thankYouEl) {
                thankYouEl.style.display = 'block';
                thankYouEl.classList.remove('hidden');
            }
            return;
        }

        const days = Math.floor(difference / (1000 * 60 * 60 * 24));
        const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((difference % (1000 * 60)) / 1000);

        const pad = (n) => String(n).padStart(2, '0');

        if (daysEl) daysEl.textContent = pad(days);
        if (hoursEl) hoursEl.textContent = pad(hours);
        if (minsEl) minsEl.textContent = pad(minutes);
        if (secsEl) secsEl.textContent = pad(seconds);
    }

    update();
    setInterval(update, 1000);
}

// Lightbox Gallery
function initGallery() {
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    const items = document.querySelectorAll('.gallery-item[data-src]');
    
    if (!lightbox || !items.length) return;

    const images = Array.from(items).map((el) => el.dataset.src);
    let currentIndex = 0;

    const openLightbox = (index) => {
        currentIndex = index;
        if (lightboxImg) lightboxImg.src = images[currentIndex];
        lightbox.classList.add('active');
        document.body.style.overflow = 'hidden';
    };

    const closeLightbox = () => {
        lightbox.classList.remove('active');
        document.body.style.overflow = '';
    };

    items.forEach((item, idx) => {
        item.addEventListener('click', () => openLightbox(idx));
    });

    const closeBtn = document.getElementById('lightbox-close');
    const prevBtn = document.getElementById('lightbox-prev');
    const nextBtn = document.getElementById('lightbox-next');

    if (closeBtn) closeBtn.addEventListener('click', closeLightbox);
    if (lightbox) {
        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) closeLightbox();
        });
    }

    if (prevBtn) {
        prevBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            if (lightboxImg) lightboxImg.src = images[currentIndex];
        });
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            currentIndex = (currentIndex + 1) % images.length;
            if (lightboxImg) lightboxImg.src = images[currentIndex];
        });
    }

    document.addEventListener('keydown', (e) => {
        if (!lightbox.classList.contains('active')) return;
        if (e.key === 'Escape') closeLightbox();
        if (e.key === 'ArrowLeft' && prevBtn) prevBtn.click();
        if (e.key === 'ArrowRight' && nextBtn) nextBtn.click();
    });
}

// Copy to Clipboard
function initCopyToClipboard() {
    document.querySelectorAll('[data-copy]').forEach((btn) => {
        btn.addEventListener('click', function () {
            const text = this.dataset.copy;
            if (!text) return;

            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(text).then(() => {
                    window.showToast('Nomor rekening/HP berhasil disalin!');
                }).catch(() => fallbackCopy(text));
            } else {
                fallbackCopy(text);
            }
        });
    });

    function fallbackCopy(text) {
        const textarea = document.createElement('textarea');
        textarea.value = text;
        textarea.style.position = 'fixed';
        textarea.style.opacity = '0';
        document.body.appendChild(textarea);
        textarea.select();
        try {
            document.execCommand('copy');
            window.showToast('Nomor rekening/HP berhasil disalin!');
        } catch (err) {
            window.showToast('Gagal menyalin text.');
        }
        document.body.removeChild(textarea);
    }
}

// Global Toast Notification Helper
window.showToast = function (msg, duration = 3500) {
    let container = document.getElementById('toast-notification');
    if (!container) {
        container = document.createElement('div');
        container.id = 'toast-notification';
        document.body.appendChild(container);
    }

    const toast = document.createElement('div');
    toast.className = 'luxury-toast-item';
    toast.innerHTML = `
        <div style="width:22px;height:22px;border-radius:50%;background:linear-gradient(135deg,#C9A84C,#E8D08A);display:flex;align-items:center;justify-content:center;color:#132220;font-weight:700;font-size:11px;flex-shrink:0;box-shadow:0 2px 8px rgba(201,168,76,0.4);">✓</div>
        <span style="font-family:'Poppins',sans-serif;font-size:0.825rem;font-weight:500;color:#FDFBF7;letter-spacing:0.02em;">${msg}</span>
    `;

    container.appendChild(toast);

    setTimeout(() => {
        toast.classList.add('show');
    }, 10);

    setTimeout(() => {
        toast.classList.remove('show');
        setTimeout(() => toast.remove(), 400);
    }, duration);
};

// Add to Google Calendar Helper
window.addToGoogleCalendar = function () {
    const title = encodeURIComponent('The Wedding of Bowo & Riska');
    const details = encodeURIComponent('Pernikahan Bowo & Riska - Kami mengundang Anda untuk hadir di hari bahagia kami.');
    const location = encodeURIComponent('Gedung Pernikahan Utama, Jakarta');
    const dates = '20260816T080000/20260816T220000';
    const url = `https://calendar.google.com/calendar/render?action=TEMPLATE&text=${title}&dates=${dates}&details=${details}&location=${location}&sf=true&output=xml`;
    window.open(url, '_blank');
};

// Global RSVP AJAX Submission
window.submitRsvp = async function (event, form) {
    event.preventDefault();
    const isWa = form.dataset.wa === '1';
    const submitBtn = event.submitter || form.querySelector('[type="submit"]');
    const origText = submitBtn ? submitBtn.innerHTML : 'Kirim';
    
    if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.innerHTML = `<svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Mengirim...`;
    }

    try {
        const formData = new FormData(form);
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content || '';
        
        const response = await fetch('/rsvp', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: formData
        });

        const data = await response.json();

        if (response.ok && data.success) {
            window.showToast('Terima kasih! Konfirmasi kehadiran Anda telah tersimpan.');
            
            if (isWa) {
                const config = window.weddingConfig || {};
                const groom = config.groomNickname || 'Bowo';
                const bride = config.brideNickname || 'Riska';
                let waPhone = (config.whatsappNumber || '').replace(/[^0-9]/g, '');
                if (waPhone.startsWith('0')) {
                    waPhone = '62' + waPhone.substring(1);
                }
                if (!waPhone) waPhone = '628123456789';

                const name = formData.get('name') || '';
                const attendance = formData.get('attendance_status') || 'hadir';
                const count = formData.get('guest_count') || '1';
                const message = formData.get('message') || '';

                let statusStr = 'Hadir';
                if (attendance === 'tidak_hadir') statusStr = 'Tidak Hadir';
                if (attendance === 'belum_pasti') statusStr = 'Belum Pasti';

                let text = `Halo ${groom} & ${bride},\n\nSaya ingin mengonfirmasi kehadiran untuk acara pernikahan Anda:\n\n` +
                           `*Nama:* ${name}\n` +
                           `*Status Kehadiran:* ${statusStr}\n` +
                           `*Jumlah Tamu:* ${count} orang\n`;
                if (message && message.trim() !== '') {
                    text += `*Pesan / Ucapan:* ${message.trim()}\n`;
                }
                text += `\nTerima kasih!`;

                const waUrl = `https://wa.me/${waPhone}?text=${encodeURIComponent(text)}`;
                window.open(waUrl, '_blank');
            }

            form.reset();
            form.dataset.wa = '0';
        } else {
            const errorMsg = data.message || (data.errors ? Object.values(data.errors).flat().join(', ') : 'Gagal mengirim RSVP.');
            window.showToast(errorMsg, 4000);
        }
    } catch (err) {
        window.showToast('Terjadi kesalahan koneksi. Silakan coba lagi.', 4000);
    } finally {
        if (submitBtn) {
            submitBtn.disabled = false;
            submitBtn.innerHTML = origText;
        }
    }
};

// Global Guestbook AJAX Submission
window.submitGuestbook = async function (event, form) {
    event.preventDefault();
    const submitBtn = form.querySelector('[type="submit"]');
    const origText = submitBtn ? submitBtn.innerHTML : 'Kirim';

    if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.innerHTML = `<svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg> Mengirim...`;
    }

    try {
        const formData = new FormData(form);
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content || '';

        const response = await fetch('/guestbook', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: formData
        });

        const data = await response.json();

        if (response.ok && data.success) {
            window.showToast('Ucapan & Doa Anda berhasil terkirim!');
            form.reset();

            const list = document.getElementById('guestbook-list');
            if (list && data.entry) {
                // Remove empty state element if present
                const emptyState = document.getElementById('guestbook-empty');
                if (emptyState) {
                    emptyState.remove();
                }

                const initial = data.entry.name ? data.entry.name.trim().charAt(0).toUpperCase() : '?';
                const safeName = document.createElement('div');
                safeName.textContent = data.entry.name;
                const safeMsg = document.createElement('div');
                safeMsg.textContent = data.entry.message;

                const newCard = document.createElement('div');
                newCard.className = 'guestbook-item';
                newCard.innerHTML = `
                    <div style="display:flex;align-items:center;gap:0.75rem;margin-bottom:0.5rem;">
                        <div style="width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,#2D4A3E,#C9A84C);display:flex;align-items:center;justify-content:center;font-weight:600;color:white;font-size:1rem;flex-shrink:0;">
                            ${initial}
                        </div>
                        <div>
                            <p style="font-weight:600;font-size:0.875rem;color:#2D4A3E;">${safeName.innerHTML}</p>
                            <p style="font-size:0.7rem;color:#999;">Baru saja</p>
                        </div>
                    </div>
                    <p style="font-size:0.875rem;color:#555;line-height:1.6;padding-left:3rem;">${safeMsg.innerHTML}</p>
                `;
                list.prepend(newCard);
                list.scrollTop = 0;
                window.triggerSparkleBurst(submitBtn);

                const countBadge = document.getElementById('guestbook-count');
                if (countBadge) {
                    const currentCount = parseInt(countBadge.textContent || '0', 10);
                    countBadge.textContent = currentCount + 1;
                }
            }
        } else {
            const errorMsg = data.message || (data.errors ? Object.values(data.errors).flat().join(', ') : 'Gagal mengirim ucapan.');
            window.showToast(errorMsg, 4000);
        }
    } catch (err) {
        window.showToast('Terjadi kesalahan koneksi. Silakan coba lagi.', 4000);
    } finally {
        if (submitBtn) {
            submitBtn.disabled = false;
            submitBtn.innerHTML = origText;
        }
    }
};

// Gold Scroll Progress Bar & Back To Top Floating Button
function initScrollProgressAndBackToTop() {
    let progressBar = document.getElementById('gold-scroll-progress');
    if (!progressBar) {
        progressBar = document.createElement('div');
        progressBar.id = 'gold-scroll-progress';
        document.body.prepend(progressBar);
    }

    let backToTopBtn = document.getElementById('back-to-top-btn');
    if (!backToTopBtn) {
        backToTopBtn = document.createElement('button');
        backToTopBtn.id = 'back-to-top-btn';
        backToTopBtn.setAttribute('aria-label', 'Back to top');
        backToTopBtn.innerHTML = `
            <svg style="width:20px;height:20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 15l7-7 7 7"/>
            </svg>
        `;
        document.body.appendChild(backToTopBtn);

        backToTopBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    const updateScrollStatus = () => {
        const scrollTop = window.scrollY || document.documentElement.scrollTop;
        const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        
        if (scrollHeight > 0) {
            const scrollPercentage = Math.min(100, Math.max(0, (scrollTop / scrollHeight) * 100));
            progressBar.style.width = `${scrollPercentage}%`;
        }

        if (scrollTop > 400) {
            backToTopBtn.classList.add('show');
        } else {
            backToTopBtn.classList.remove('show');
        }
    };

    window.addEventListener('scroll', updateScrollStatus, { passive: true });
    updateScrollStatus();
}

// Falling Petals Canvas Engine
function initPetalsCanvas() {
    let canvas = document.getElementById('petals-canvas');
    if (!canvas) {
        canvas = document.createElement('canvas');
        canvas.id = 'petals-canvas';
        document.body.appendChild(canvas);
    }

    const ctx = canvas.getContext('2d');
    if (!ctx) return;

    let width = (canvas.width = window.innerWidth);
    let height = (canvas.height = window.innerHeight);

    window.addEventListener('resize', () => {
        width = canvas.width = window.innerWidth;
        height = canvas.height = window.innerHeight;
    }, { passive: true });

    const petalCount = window.innerWidth < 768 ? 12 : 24;
    const petals = [];

    const colors = [
        'rgba(201, 168, 76, 0.45)',
        'rgba(232, 208, 138, 0.55)',
        'rgba(255, 248, 231, 0.65)',
        'rgba(180, 145, 60, 0.35)'
    ];

    for (let i = 0; i < petalCount; i++) {
        petals.push({
            x: Math.random() * width,
            y: Math.random() * height,
            size: Math.random() * 6 + 4,
            speedY: Math.random() * 0.8 + 0.4,
            speedX: Math.random() * 0.4 - 0.2,
            angle: Math.random() * 360,
            spin: (Math.random() - 0.5) * 1.5,
            color: colors[Math.floor(Math.random() * colors.length)]
        });
    }

    function drawPetal(p) {
        ctx.save();
        ctx.translate(p.x, p.y);
        ctx.rotate((p.angle * Math.PI) / 180);
        ctx.fillStyle = p.color;

        ctx.beginPath();
        ctx.moveTo(0, -p.size);
        ctx.bezierCurveTo(p.size * 0.8, -p.size * 0.5, p.size * 0.8, p.size * 0.5, 0, p.size);
        ctx.bezierCurveTo(-p.size * 0.8, p.size * 0.5, -p.size * 0.8, -p.size * 0.5, 0, -p.size);
        ctx.fill();
        ctx.restore();
    }

    function render() {
        ctx.clearRect(0, 0, width, height);

        for (let i = 0; i < petals.length; i++) {
            const p = petals[i];
            p.y += p.speedY;
            p.x += Math.sin(p.y * 0.01) * 0.5 + p.speedX;
            p.angle += p.spin;

            if (p.y > height + 20) {
                p.y = -20;
                p.x = Math.random() * width;
            }
            if (p.x > width + 20) p.x = -20;
            if (p.x < -20) p.x = width + 20;

            drawPetal(p);
        }

        requestAnimationFrame(render);
    }

    render();

// Gold Dust Trail for Mouse Cursor (Desktop)
function initGoldDustTrail() {
    if (window.innerWidth < 768) return; // Only desktop for performance

    let lastTime = 0;
    window.addEventListener('mousemove', (e) => {
        const now = Date.now();
        if (now - lastTime < 45) return; // Throttle to 22fps for smooth performance
        lastTime = now;

        const dot = document.createElement('div');
        dot.className = 'gold-dust-dot';
        dot.style.left = `${e.clientX}px`;
        dot.style.top = `${e.clientY}px`;
        document.body.appendChild(dot);

        setTimeout(() => dot.remove(), 800);
    }, { passive: true });
}

// Floating Song Title Pill Badge Indicator
function initMusicBadge() {
    let badge = document.getElementById('music-song-badge');
    if (!badge) {
        badge = document.createElement('div');
        badge.id = 'music-song-badge';
        badge.innerHTML = `
            <span style="font-size:12px;">🎵</span>
            <span>Now Playing: Wedding Music</span>
        `;
        document.body.appendChild(badge);
    }

    const bgMusic = document.getElementById('bgMusic');
    if (bgMusic) {
        bgMusic.addEventListener('play', () => {
            badge.classList.add('show');
            setTimeout(() => {
                badge.classList.remove('show');
            }, 4500);
        });
    }
}

// Celebration Gold Sparkle Burst FX
window.triggerSparkleBurst = function (targetEl) {
    const rect = targetEl ? targetEl.getBoundingClientRect() : { left: window.innerWidth / 2, top: window.innerHeight / 2, width: 0, height: 0 };
    const centerX = rect.left + rect.width / 2;
    const centerY = rect.top + rect.height / 2;

    const count = 28;
    for (let i = 0; i < count; i++) {
        const dot = document.createElement('div');
        dot.className = 'sparkle-burst-dot';
        dot.style.left = `${centerX}px`;
        dot.style.top = `${centerY}px`;

        const angle = (i / count) * 360;
        const distance = Math.random() * 90 + 40;
        const tx = Math.cos((angle * Math.PI) / 180) * distance;
        const ty = Math.sin((angle * Math.PI) / 180) * distance;

        dot.style.setProperty('--tx', `${tx}px`);
        dot.style.setProperty('--ty', `${ty}px`);

        document.body.appendChild(dot);
        setTimeout(() => dot.remove(), 1000);
    }
};
}

Alpine.start();
