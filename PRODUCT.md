# Wedding Invitation — Bowo & Riska

**Platform:** web  
**Type:** Single-page wedding invitation website  
**Audience:** Wedding guests (primarily Indonesian-speaking, mobile-first)  
**Brand:** Elegant, romantic, timeless  

## Purpose

A digital wedding invitation that guests receive via personalized URL (`?to=GuestName`). The site provides all wedding details, enables RSVP submission, displays a photo gallery, collects guestbook messages, and shares gift transfer details.

## Core Surfaces

1. **Landing/Cover** — Full-screen invitation cover with guest name personalization and "Open Invitation" CTA
2. **Main Content** — Single-page scroll with 13 sections (Hero, Quote, Couple, Countdown, Event, Location, Love Story, Gallery, RSVP, Gift, Guestbook, Closing)
3. **Admin Panel** — CRUD interface for managing guests, RSVPs, guestbook, gallery, and site settings

## Key User Flows

### Guest Flow
1. Click personalized invitation link → See loading screen (1s)
2. View cover page with their name → Click "Open Invitation"
3. Background music starts, scroll through wedding details
4. Submit RSVP form (attendance confirmation)
5. Leave guestbook message
6. View/copy bank account for wedding gift

### Admin Flow
1. Login at `/admin` → Dashboard with stats
2. Manage guest list (CRUD)
3. Review RSVP responses and guestbook entries
4. Upload gallery photos
5. Update site settings (names, dates, venues, etc.)

## Design Principles

- **Elegant & Romantic:** Serif headings (Cormorant Garamond), muted color palette, ample whitespace
- **Mobile-First:** Majority of guests will view on phones
- **Single-Page:** Smooth scrolling experience, no page reloads
- **Subtle Animations:** Fade-in on scroll, smooth transitions, no jarring effects
- **Accessibility:** Readable contrast, clear hierarchy, semantic HTML

## Content Strategy

- **Tone:** Warm, formal-yet-personal, Indonesian language
- **Copy:** Concise event details, romantic quotes, factual logistics
- **Imagery:** Couple photos, venue photos, decorative elements (minimal, tasteful)

## Technical Context

- **Stack:** Laravel 12, Blade templates, Tailwind CSS v4, Alpine.js
- **Database:** SQLite (guests, rsvps, guestbooks, galleries, settings)
- **Assets:** Public folder for photos/music
- **Deployment:** Standard PHP hosting (shared/VPS)
