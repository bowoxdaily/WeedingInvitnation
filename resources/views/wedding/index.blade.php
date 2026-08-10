<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>The Wedding of {{ $settings['groom_nickname'] ?? 'Bowo' }} &amp; {{ $settings['bride_nickname'] ?? 'Riska' }}</title>
    
    <meta name="title" content="The Wedding of {{ $settings['groom_nickname'] ?? 'Bowo' }} &amp; {{ $settings['bride_nickname'] ?? 'Riska' }}">
    <meta name="description" content="You are invited to our wedding!">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400;1,500&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="antialiased bg-cream-page text-gray-800 font-sans overflow-x-hidden" 
      x-data="weddingApp()" x-init="initApp()" :class="{ 'overflow-hidden': !isOpen, 'overflow-auto': isOpen }">

    <!-- Toast Notification Container -->
    <div id="toast-notification"></div>

    <audio id="bgMusic" loop preload="auto">
        <source src="{{ $settings['music_file'] ?? '/music/wedding-song.mp3' }}" type="audio/mpeg">
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
            class="fixed bottom-6 right-4 sm:right-6 z-40 bg-white/90 backdrop-blur-md shadow-xl p-3.5 rounded-full text-gold border border-gold/40 hover:bg-white hover:scale-110 transition-all duration-300" 
            :class="{ 'animate-spin-slow': isPlaying }"
            aria-label="Toggle Music Player">
        <svg x-show="isPlaying" class="w-6 h-6 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
            <path d="M18 3a1 1 0 00-1.196-.98l-10 2A1 1 0 006 5v9.114A4.369 4.369 0 005 14c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V7.236l8-1.6V11.114A4.369 4.369 0 0015 11c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V3z"/>
        </svg>
        <svg x-show="!isPlaying" class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2" />
        </svg>
    </button>

    @include('wedding.partials.loading')
    @include('wedding.partials.cover')

    <main x-show="isOpen" x-transition.opacity.duration.800ms class="min-h-screen relative w-full" style="background-color:#FAF6F0;" x-cloak>
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