<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>The Wedding of {{ $settings['groom_nickname'] ?? 'Bowo' }} &amp; {{ $settings['bride_nickname'] ?? 'Riska' }}</title>
    
    <meta name="title" content="The Wedding of {{ $settings['groom_nickname'] ?? 'Bowo' }} &amp; {{ $settings['bride_nickname'] ?? 'Riska' }}">
    <meta name="description" content="Kami mengundang Anda untuk menghadiri pernikahan {{ $settings['groom_nickname'] ?? 'Bowo' }} &amp; {{ $settings['bride_nickname'] ?? 'Riska' }} pada {{ $settings['wedding_date'] ?? '16 Agustus 2026' }}.">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Open Graph / WhatsApp Preview -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->fullUrl() }}">
    <meta property="og:title" content="The Wedding of {{ $settings['groom_nickname'] ?? 'Bowo' }} &amp; {{ $settings['bride_nickname'] ?? 'Riska' }}">
    <meta property="og:description" content="Kami mengundang Anda untuk menghadiri pernikahan {{ $settings['groom_nickname'] ?? 'Bowo' }} &amp; {{ $settings['bride_nickname'] ?? 'Riska' }} pada {{ $settings['wedding_date'] ?? '16 Agustus 2026' }}.">
    <meta property="og:image" content="{{ asset($settings['hero_photo'] ?? '/images/placeholder-hero.jpg') }}">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ request()->fullUrl() }}">
    <meta name="twitter:title" content="The Wedding of {{ $settings['groom_nickname'] ?? 'Bowo' }} &amp; {{ $settings['bride_nickname'] ?? 'Riska' }}">
    <meta name="twitter:description" content="Kami mengundang Anda untuk menghadiri pernikahan {{ $settings['groom_nickname'] ?? 'Bowo' }} &amp; {{ $settings['bride_nickname'] ?? 'Riska' }} pada {{ $settings['wedding_date'] ?? '16 Agustus 2026' }}.">
    <meta name="twitter:image" content="{{ asset($settings['hero_photo'] ?? '/images/placeholder-hero.jpg') }}">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400;1,500&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        window.weddingConfig = {
            whatsappNumber: @json($settings['whatsapp_number'] ?? '628123456789'),
            groomNickname: @json($settings['groom_nickname'] ?? 'Bowo'),
            brideNickname: @json($settings['bride_nickname'] ?? 'Riska'),
            weddingDate: @json($settings['wedding_date'] ?? '16 Agustus 2026')
        };
    </script>

    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="antialiased bg-cream-page text-gray-800 font-sans overflow-x-hidden" 
      x-data="weddingApp()" x-init="initApp()" :class="{ 'overflow-hidden': !isOpen, 'overflow-auto': isOpen }">

    <!-- Toast Notification Container -->
    <div id="toast-notification"></div>

    <audio id="bgMusic" loop preload="auto">
        <source src="{{ !empty($settings['music_file']) ? asset($settings['music_file']) : asset('music/wedding-song.mp3') }}" type="audio/mpeg">
    </audio>

        <!-- Floating Mobile & Desktop Navigation Bar -->
    <nav class="mobile-nav-bar" x-show="isOpen" x-transition.opacity.duration.400ms x-cloak>
        <a href="#hero" :class="{ 'active': activeSection === 'hero' }">Home</a>
        <a href="#couple" :class="{ 'active': activeSection === 'couple' }">Couple</a>
        <a href="#event" :class="{ 'active': activeSection === 'event' }">Event</a>
        <a href="#gallery" :class="{ 'active': activeSection === 'gallery' }">Gallery</a>
        <a href="#rsvp" :class="{ 'active': activeSection === 'rsvp' }">RSVP</a>
        <a href="#gift" :class="{ 'active': activeSection === 'gift' }">Gift</a>
        <a href="#guestbook" :class="{ 'active': activeSection === 'guestbook' }">Guestbook</a>
    </nav>

    <!-- Floating Audio Toggle Button -->
    <button @click="toggleMusic()" x-show="isOpen" x-transition.scale.duration.300ms x-cloak
            class="music-floating-btn fixed bottom-6 right-4 sm:right-6 z-40 bg-white/90 backdrop-blur-md shadow-xl p-3.5 rounded-full text-gold border border-gold/40 hover:bg-white hover:scale-110 transition-all duration-300" 
            :class="{ 'animate-spin-slow': isPlaying }"
            aria-label="Toggle Music Player">
        <div x-show="isPlaying" class="audio-eq-wrapper">
            <span class="eq-bar"></span>
            <span class="eq-bar"></span>
            <span class="eq-bar"></span>
        </div>
        <svg x-show="!isPlaying" class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2" />
        </svg>
    </button>

    @include('wedding.partials.loading')
    @include('wedding.partials.cover')

    <main x-show="isOpen" 
          x-transition:enter="transition ease-out duration-1000 transform"
          x-transition:enter-start="opacity-0 scale-105"
          x-transition:enter-end="opacity-100 scale-100"
          class="min-h-screen relative w-full" style="background-color:#FAF6F0;" x-cloak>
        @include('wedding.sections.hero')
        @include('wedding.sections.quote')
        @include('wedding.sections.couple')
        @include('wedding.sections.countdown')
        @include('wedding.sections.event')
        @include('wedding.sections.location')
        @if(!empty($loveStory) && count($loveStory) > 0)
            @include('wedding.sections.lovestory')
        @endif
        @include('wedding.sections.gallery')
        @include('wedding.sections.rsvp')
        @include('wedding.sections.gift')
        @include('wedding.sections.guestbook')
        @include('wedding.sections.closing')
    </main>

    @include('wedding.partials.lightbox')

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('weddingApp', () => ({
                isOpen: false, 
                isPlaying: false, 
                isLoading: true, 
                music: null,
                activeSection: 'hero',
                initApp() {
                    this.music = document.getElementById('bgMusic');
                    window.addEventListener('load', () => { 
                        setTimeout(() => { this.isLoading = false; }, 800); 
                    });

                    const sections = ['hero', 'couple', 'event', 'gallery', 'rsvp', 'gift', 'guestbook'];
                    window.addEventListener('scroll', () => {
                        const scrollPos = window.scrollY + 200;
                        sections.forEach(secId => {
                            const el = document.getElementById(secId);
                            if (el && scrollPos >= el.offsetTop && scrollPos < (el.offsetTop + el.offsetHeight)) {
                                this.activeSection = secId;
                            }
                        });
                    }, { passive: true });
                },
                openInvitation() { 
                    this.isOpen = true; 
                    document.body.classList.remove('overflow-hidden'); 
                    this.playMusic(); 
                },
                playMusic() { 
                    if (this.music) { 
                        this.music.volume = 0.5;
                        this.music.play().then(() => { 
                            this.isPlaying = true; 
                        }).catch(e => console.log("Audio play deferred:", e)); 
                    } 
                },
                toggleMusic() { 
                    if (this.music) { 
                        if (this.isPlaying) { 
                            this.music.pause(); 
                            this.isPlaying = false; 
                        } else { 
                            this.playMusic(); 
                        } 
                    } 
                }
            }));
        });
    </script>
</body>
</html>