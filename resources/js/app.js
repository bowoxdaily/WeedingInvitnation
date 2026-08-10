import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

document.addEventListener('DOMContentLoaded', function () {
    initAOS();
    initCountdown();
    initGallery();
    initCopyToClipboard();
    initParticles();
});

// Custom Intersection Observer for AOS animations
function initAOS() {
    if (!document.getElementById('aos-custom-styles')) {
        const style = document.createElement('style');
        style.id = 'aos-custom-styles';
        style.textContent = `
            [data-aos] {
                opacity: 0;
                transition-property: transform, opacity;
                transition-timing-function: cubic-bezier(0.16, 1, 0.3, 1);
                will-change: transform, opacity;
            }
            [data-aos="fade-up"] { transform: translateY(35px); }
            [data-aos="fade-down"] { transform: translateY(-35px); }
            [data-aos="fade-left"] { transform: translateX(35px); }
            [data-aos="fade-right"] { transform: translateX(-35px); }
            [data-aos="zoom-in"] { transform: scale(0.92); }
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
            if (entry.isIntersecting) {
                const el = entry.target;
                const delay = parseInt(el.dataset.aosDelay || 0, 10);
                const duration = parseInt(el.dataset.aosDuration || 700, 10);
                el.style.transitionDuration = `${duration}ms`;
                el.style.transitionDelay = `${delay}ms`;
                
                setTimeout(() => {
                    el.classList.add('aos-animate');
                }, 50);

                observer.unobserve(el);
            }
        });
    }, {
        threshold: 0.08,
        rootMargin: '0px 0px -40px 0px'
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
    const submitBtn = form.querySelector('[type="submit"]');
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
            form.reset();
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

Alpine.start();
