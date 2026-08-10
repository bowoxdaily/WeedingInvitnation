# Wedding Invitation Design System

**Version:** 1.0  
**Last Updated:** 2026-08-10  

## Visual Identity

### Color Palette

**Primary Colors:**
- `#FFFFF0` — Ivory (base background)
- `#F7E7CE` — Champagne (soft accents)
- `#C9A84C` — Gold (highlights, CTAs, ornaments)
- `#1F3530` — Forest Green (dark backgrounds, overlays)
- `#2D4A3E` — Sage Green (secondary dark)

**Usage:**
- Background: Ivory throughout main content
- Dark sections: Forest Green with reduced opacity overlays
- Interactive elements: Gold hover states
- Text: Dark gray (#1F3530) on light, White on dark
- Accents: Gold ornamental details (❖, dividers)

### Typography

**Fonts:**
- **Display/Headings:** `Cormorant Garamond` (serif, weights 300-700)
- **Body/UI:** `Poppins` (sans-serif, weights 300-600)

**Hierarchy:**
- H1 (Names): `clamp(3.5rem, 12vw, 6rem)`, Cormorant, weight 600
- H2 (Section Titles): `clamp(2rem, 6vw, 3rem)`, Cormorant, weight 500
- H3 (Subsections): `1.5rem`, Cormorant, weight 500
- Body: `1rem` (16px), Poppins, weight 400
- Small/Meta: `0.875rem` (14px), Poppins, weight 300
- Uppercase Labels: `0.7-0.75rem`, letter-spacing `0.25-0.35em`

### Spacing & Layout

**Scale:** 4px base unit
- Micro: 0.5rem (8px)
- Small: 1rem (16px)
- Medium: 1.5-2rem (24-32px)
- Large: 3-4rem (48-64px)
- XL: 6rem+ (96px+)

**Containers:**
- Max width: 1200px (wide content), 800px (reading), 480px (forms)
- Padding: 1.5rem mobile, 2rem tablet+
- Section spacing: 5-6rem vertical between major sections

### Components

**Buttons:**
- `.btn-gold`: Gold background, white text, rounded, hover scale 1.05
- Padding: 0.875rem 2rem
- Font: Poppins 400, 0.9rem, letter-spacing 0.1em

**Cards/Panels:**
- `.glass-panel`: `rgba(255,255,255,0.8)` background, `backdrop-filter: blur(10px)`, subtle border
- Shadow: `0 4px 20px rgba(0,0,0,0.08)`
- Border radius: 0.5rem (8px)

**Forms:**
- Input/Textarea: White background, 1px border `#E5E7EB`, focus border Gold, rounded
- Labels: Uppercase, 0.75rem, letter-spacing 0.15em
- Validation: Red error text below field

**Dividers:**
- Horizontal: 1px, Gold, max-width 100-200px, centered
- With ornament: Gold ❖ symbol flanked by gradient lines

### Animations & Transitions

**On-Scroll Fade-In:**
- `.fade-in`: Initial `opacity: 0, translateY(20px)`
- `.fade-in.visible`: `opacity: 1, translateY(0)`, transition 0.8s ease-out
- Triggered by IntersectionObserver at 10% threshold

**Interactive:**
- Hover: `scale(1.05)`, `opacity` changes, 0.3s ease
- Music button: Slow spin when playing
- Modal/Overlay: `backdrop-blur`, fade-in/out 0.5s

**Page Transitions:**
- Loading screen → Cover: Opacity fade (1s)
- Cover → Main: Opacity + translateY (0.8s)

### Imagery

**Photo Treatment:**
- Aspect ratios: 3:4 (portrait), 16:9 (landscape)
- Overlay: `linear-gradient(to bottom, rgba(31,53,48,0.6), rgba(31,53,48,0.85))` on hero
- Opacity: 0.3 on cover background image
- Gallery: Responsive grid, 2 cols mobile, 3-4 cols desktop

**Placeholders:**
- `/images/placeholder-hero.jpg` for missing hero
- Gray box with icon for missing gallery images

### Responsive Breakpoints

- **Mobile:** < 640px (base styles)
- **Tablet:** 640px - 1024px
- **Desktop:** > 1024px

**Adaptations:**
- Font sizes: `clamp()` for fluid scaling
- Grid: 1 col → 2 cols → 3-4 cols
- Spacing: Reduced on mobile (1.5rem vs 2-3rem)
- Hero height: `100vh` mobile, `80vh` desktop

### Accessibility

- **Contrast:** WCAG AA minimum (4.5:1 body, 3:1 large text)
- **Focus states:** Visible outline on keyboard navigation
- **Alt text:** All images require descriptive alt
- **Semantic HTML:** Proper heading hierarchy, landmarks
- **Form labels:** Associated with inputs, error messages announced

## Design Patterns to Avoid (Anti-Slop)

- ❌ Generic placeholder text ("Lorem ipsum", "Coming soon")
- ❌ Stock photo watermarks or low-res images
- ❌ Arbitrary animations (spinning, bouncing without purpose)
- ❌ Inconsistent spacing (use scale, not random values)
- ❌ Overuse of shadows/gradients (keep elegant, minimal)
- ❌ Too many font weights or sizes (stick to hierarchy)
- ❌ Cluttered layouts (embrace whitespace)
- ❌ Unclear CTAs (buttons must be obvious and actionable)

## Component Library (Blade Partials)

### Layout
- `wedding.index` — Main wrapper with Alpine.js app state
- `wedding.partials.loading` — Initial loading screen
- `wedding.partials.cover` — Landing/cover page
- `wedding.partials.lightbox` — Photo viewer modal

### Sections
- `wedding.sections.hero` — Full-height hero with couple photo
- `wedding.sections.quote` — Wedding quote/verse
- `wedding.sections.couple` — Bride & groom details with parents
- `wedding.sections.countdown` — Live countdown to wedding date
- `wedding.sections.event` — Akad & reception details
- `wedding.sections.location` — Google Maps embed
- `wedding.sections.lovestory` — Timeline of relationship
- `wedding.sections.gallery` — Photo grid with lightbox
- `wedding.sections.rsvp` — RSVP form with AJAX submission
- `wedding.sections.gift` — Bank transfer details with copy button
- `wedding.sections.guestbook` — Message form + recent entries
- `wedding.sections.closing` — Thank you + footer

### Admin
- `admin.layout` — Admin panel wrapper
- `admin.login` — Login form
- `admin.dashboard` — Stats overview
- `admin.guests.*` — Guest CRUD views
- `admin.rsvps.index` — RSVP list
- `admin.guestbooks.index` — Guestbook moderation
- `admin.gallery.index` — Photo upload/management
- `admin.settings.index` — Site configuration

## Maintenance Notes

- Settings stored in `settings` table (key-value pairs)
- Gallery photos saved to `/storage/app/public/gallery/`
- Background music file path configurable via settings
- Guest names passed via URL query `?to=Name` for personalization
- CSRF protection on all forms (Laravel default)
