# Wedding Invitation - Bowo & Riska

A beautiful, elegant digital wedding invitation website built with Laravel 12, Tailwind CSS v4, and Alpine.js.

## Features
- Beautiful Cover Page with guest name personalization (?to=GuestName)  
- 15 Complete Sections with animations
- Background Music player
- Countdown Timer
- Interactive Gallery with Lightbox
- RSVP Form with AJAX submission
- Guestbook
- Wedding Gift with copy-to-clipboard
- Fully Responsive

## Admin Panel
Access at `/admin`
- Default: admin@wedding.com / wedding2026

## Quick Start
```
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
npm run build
php artisan serve
```

Open http://localhost:8000

