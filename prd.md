PRD.md

Wedding Invitation Website

Project Name:
Bowo & Riska Wedding Invitation

Event Date:
16 Agustus 2026

Document Version:
1.0

1. Product Overview

Wedding Invitation Website adalah undangan pernikahan digital berbasis website yang responsive dan mobile-first.

Website digunakan untuk membagikan informasi acara pernikahan kepada tamu melalui sebuah link personal.

Contoh:

https://wedding.domain.com/?to=Bapak%20Andi

Website harus memberikan kesan:

Elegant
Professional
Luxury
Romantic
Modern
Clean
Responsive

Mayoritas tamu diperkirakan membuka undangan dari smartphone melalui WhatsApp. Karena itu pengalaman mobile menjadi prioritas utama.

2. Product Goals

Tujuan utama:

Membuat undangan digital yang terlihat premium.

Memberikan informasi acara secara jelas.

Mempermudah tamu menemukan lokasi acara.

Memungkinkan tamu mengirim RSVP.

Memungkinkan tamu mengirim ucapan.

Memungkinkan nama tamu tampil otomatis.

Memungkinkan tamu mengirim hadiah secara digital.

Membuat pengalaman membuka undangan terasa personal.

3. Target Users

Primary User

Tamu undangan pernikahan.

Device utama:

Android
iPhone

Secondary Device:

Tablet
Laptop
Desktop

Admin User

Pemilik undangan.

Admin dapat:

Melihat RSVP.
Melihat daftar tamu.
Melihat ucapan.
Menambah atau menghapus tamu.
Mengubah informasi acara.

4. Design Direction

Tema visual:

Luxury Wedding
Modern Elegant
Minimalist
Romantic

Color Palette rekomendasi:

Ivory
White
Champagne
Sage Green
Dark Green
Gold Accent

Hindari terlalu banyak warna.

Typography:

Heading menggunakan serif elegant.

Contoh:

Cormorant Garamond
Playfair Display
Libre Baskerville

Body menggunakan sans-serif.

Contoh:

Inter
Montserrat
Poppins

Desain harus memiliki:

Whitespace yang cukup.
Typography hierarchy yang jelas.
Animasi lembut.
Elemen floral minimal.
Tidak terlalu banyak ornament.
Layout bersih.

5. Responsive Design

Website wajib responsive.

Target breakpoint:

Mobile:
320px sampai 767px

Tablet:
768px sampai 1023px

Desktop:
1024px ke atas

Prioritas desain:

Mobile First

Semua section harus tetap nyaman digunakan pada layar kecil.

Tidak boleh terdapat horizontal scrolling.

Text harus tetap terbaca tanpa zoom.

Button minimum nyaman disentuh pengguna smartphone.

6. Main User Flow

Tamu menerima link melalui WhatsApp.

Contoh:

https://wedding.domain.com/?to=Bapak%20Ahmad

User membuka link.

Muncul Cover Invitation.

Menampilkan:

Wedding Invitation

Bowo & Riska

Kepada Yth.

Bapak Ahmad

Button:

Open Invitation

Setelah ditekan:

Background music mulai.
Halaman utama terbuka.
User dapat scroll seluruh undangan.

7. Pages

Website utama menggunakan Single Page Wedding Invitation.

Admin menggunakan halaman terpisah.

Main Routes:

/

Invitation Page

/admin

Admin Dashboard

/admin/login

Admin Authentication

8. Invitation Cover

Section pertama sebelum invitation dibuka.

Konten:

The Wedding Of

Bowo & Riska

16.08.2026

Kepada Yth.

Nama Tamu

Button:

Open Invitation

Background:

Foto pasangan atau background floral elegant.

Optional:

Blur overlay.
Dark overlay.
Luxury typography.

9. Hero Section

Setelah invitation dibuka.

Konten:

The Wedding Of

Bowo

&

Riska

16 August 2026

Optional text:

We are getting married.

Tampilkan foto utama pasangan.

Tambahkan scroll indicator.

10. Wedding Quote

Section quote romantis.

Contoh:

A beautiful journey begins with two hearts choosing one path together.

Quote harus mudah diubah melalui admin atau configuration.

11. Bride & Groom Section

Menampilkan kedua mempelai.

Bride:

Riska

Foto.

Nama lengkap.

Putri dari:

Bapak [Nama Ayah]
&
Ibu [Nama Ibu]

Instagram optional.

Groom:

Bowo

Foto.

Nama lengkap.

Putra dari:

Bapak [Nama Ayah]
&
Ibu [Nama Ibu]

Instagram optional.

12. Countdown Section

Menampilkan countdown menuju:

16 Agustus 2026

Format:

Days
Hours
Minutes
Seconds

Contoh:

06 Days
12 Hours
34 Minutes
20 Seconds

Countdown berjalan realtime dengan JavaScript.

Ketika tanggal acara sudah lewat:

Ubah menjadi:

Thank You For Being Part of Our Special Day.

13. Wedding Event Section

Akad Nikah

Tanggal:

Minggu, 16 Agustus 2026

Jam:

[Jam Akad]

Lokasi:

[Nama Lokasi]

Alamat:

[Alamat Lengkap]

Button:

Open Google Maps

Resepsi

Tanggal:

Minggu, 16 Agustus 2026

Jam:

[Jam Resepsi]

Lokasi:

[Nama Lokasi]

Alamat:

[Alamat Lengkap]

Button:

Open Google Maps

14. Add To Calendar

Sediakan tombol:

Add to Calendar

Mendukung:

Google Calendar

Optional:

Download .ics

Informasi event:

Wedding Bowo & Riska
16 Agustus 2026
Lokasi acara.

15. Love Story

Timeline hubungan pasangan.

Contoh struktur:

First Meet

[Tahun]

Cerita singkat.

Our Journey

[Tahun]

Cerita singkat.

Engagement

[Tahun]

Cerita singkat.

Wedding

16 August 2026

Our forever begins.

Tampilan timeline harus responsive.

16. Gallery

Menampilkan foto pasangan.

Layout:

Mobile:
2 column grid.

Desktop:
3 sampai 4 column grid.

Fitur:

Image lazy loading.
Image compression.
Lightbox.
Swipe gallery pada mobile.
Smooth transition.

Optional:

Pre-wedding gallery.

17. Video Section

Optional.

Menampilkan video pre-wedding.

Sumber:

YouTube
Vimeo
Local Video

Video tidak autoplay.

User harus menekan play.

18. RSVP

Form RSVP.

Field:

Nama

Status Kehadiran

Options:

Hadir
Tidak Hadir
Belum Pasti

Jumlah Tamu

1
2
3
4

Pesan optional.

Button:

Send RSVP

Setelah submit:

Thank you for confirming your attendance.

RSVP disimpan ke database.

19. Guest Name Personalization

Nama tamu berasal dari URL parameter.

Contoh:

?to=Bapak%20Andi

Frontend membaca parameter:

to

Kemudian menampilkan:

Kepada Yth.

Bapak Andi

Jika parameter tidak tersedia:

Tamu Undangan

Sanitize input untuk mencegah XSS.

20. Guestbook

Tamu dapat mengirim ucapan.

Form:

Nama

Pesan

Button:

Send Wishes

Setelah submit, ucapan muncul pada Guestbook.

Contoh:

Andi

Selamat menempuh hidup baru. Semoga selalu bahagia.

Fitur:

Pagination atau load more.

Admin dapat menghapus pesan.

21. Wedding Gift

Section:

Wedding Gift

Text:

Your presence and prayers are the greatest gift for us.

Optional transfer information.

Bank:

BCA

Account Number:

[Nomor Rekening]

Account Name:

[Nama]

Button:

Copy Account Number

Bank kedua optional.

E-Wallet optional.

QRIS optional.

22. Copy To Clipboard

Saat user menekan nomor rekening:

Nomor otomatis disalin.

Tampilkan notification:

Account number copied.

23. Digital Envelope Confirmation

Optional.

User dapat melakukan konfirmasi hadiah.

Form:

Nama

Nominal optional

Pesan

Button:

Confirm Gift

Tidak wajib digunakan jika tidak diperlukan.

24. Wedding Location

Gunakan Google Maps.

Tampilkan:

Map preview.

Button:

Open Maps

Button:

Get Direction

Jangan embed map berat jika memperlambat website.

Gunakan static preview atau lazy loaded iframe.

25. Background Music

Wedding invitation memiliki background music.

Fitur:

Music mulai setelah user menekan:

Open Invitation

Tidak autoplay sebelum user interaction karena keterbatasan browser.

Tampilkan floating button:

Music ON
Music OFF

Music tetap berjalan selama user scrolling.

26. Floating Navigation

Pada mobile dapat menggunakan floating navigation.

Menu:

Home
Couple
Event
Gallery
RSVP
Gift

Optional.

Navigation tidak boleh mengganggu tampilan.

27. Scroll Animation

Gunakan animasi ringan.

Contoh:

Fade Up
Fade In
Zoom In subtle

Duration sekitar:

500 sampai 1000ms

Hindari animasi berlebihan.

Animasi harus tetap smooth pada smartphone kelas menengah.

28. Loading Screen

Ketika website pertama dibuka:

Tampilkan loading sederhana.

Contoh:

B & R

Wedding Invitation

Loading maksimal hanya selama asset utama dimuat.

Jangan membuat loading artificial terlalu lama.

29. Performance Requirements

Target Lighthouse:

Performance:
90+

Accessibility:
90+

Best Practices:
90+

SEO:
90+

Target loading:

First Contentful Paint kurang dari 2 detik pada koneksi normal.

Gunakan:

WebP
AVIF jika tersedia
Lazy loading
Image compression
Code splitting
Caching
Minification

30. Image Optimization

Semua gambar wedding harus dioptimalkan.

Thumbnail:

100 sampai 300 KB.

Hero:

Target maksimum sekitar 500 KB.

Hindari upload langsung foto kamera 5 sampai 15 MB tanpa compression.

Gunakan format:

WebP

Fallback:

JPEG.

31. Accessibility

Gunakan:

Alt text pada gambar.
Contrast text yang cukup.
Button mudah ditekan.
Semantic HTML.
Keyboard navigation untuk desktop.
ARIA label jika diperlukan.

32. SEO

Metadata:

Title:

The Wedding of Bowo & Riska | 16 August 2026

Description:

Wedding invitation of Bowo & Riska. We would be honored to have you celebrate our special day with us.

Open Graph:

og:title

og:description

og:image

og:url

Twitter Card.

Ketika link dibagikan ke WhatsApp, tampilkan:

Foto pasangan.

Bowo & Riska

16 August 2026

33. Social Sharing

Sediakan tombol optional:

Share Invitation

Mendukung:

WhatsApp
Copy Link

Contoh pesan:

You're invited to celebrate the wedding of Bowo & Riska on 16 August 2026.

34. Admin Authentication

Admin harus login.

Route:

/admin/login

Field:

Email

Password

Admin page tidak boleh dapat diakses tanpa authentication.

35. Admin Dashboard

Dashboard menampilkan:

Total Guest

RSVP Hadir

RSVP Tidak Hadir

Belum Konfirmasi

Total Guestbook Message

Contoh:

Total Guest
300

Hadir
215

Tidak Hadir
25

Belum RSVP
60

36. Guest Management

Admin dapat:

Tambah tamu.
Edit tamu.
Hapus tamu.
Search tamu.
Generate invitation link.

Field:

Name

Phone Number optional

Guest Limit

Invitation Code

RSVP Status

Example link:

https://wedding.domain.com/?to=Bapak%20Andi

Optional secure URL:

https://wedding.domain.com/invite/A8HD73K

37. RSVP Management

Admin melihat tabel:

Guest Name

Attendance

Guest Count

Message

Submitted At

Admin dapat export:

Excel
CSV

38. Guestbook Management

Admin dapat:

Melihat ucapan.
Search.
Delete.
Hide message.

Optional moderation.

39. Wedding Content Management

Admin dapat mengubah:

Nama mempelai.
Tanggal pernikahan.
Jam acara.
Alamat.
Google Maps.
Nama orang tua.
Love story.
Wedding quote.
Bank account.
Instagram.
Background music.

40. Gallery Management

Admin dapat:

Upload foto.
Delete foto.
Change ordering.

Upload harus melakukan:

Resize.
Compression.
WebP conversion.

41. Security

Website harus menggunakan HTTPS.

Backend validation wajib.

Proteksi:

CSRF

XSS

SQL Injection

Rate limiting

Form spam

Sanitize guest name.

RSVP dan Guestbook endpoint harus memiliki rate limit.

42. Spam Protection

Untuk RSVP dan Guestbook gunakan salah satu:

Cloudflare Turnstile

atau

Google reCAPTCHA

Preferensi:

Cloudflare Turnstile karena user experience lebih sederhana.

43. Database Structure

Table:

admins

id
name
email
password
created_at
updated_at

Table:

guests

id
name
phone
guest_limit
invitation_code
created_at
updated_at

Table:

rsvps

id
guest_id
name
attendance_status
guest_count
message
created_at
updated_at

Table:

guestbooks

id
guest_id nullable
name
message
status
created_at
updated_at

Table:

galleries

id
image
thumbnail
sort_order
created_at
updated_at

Table:

settings

id
key
value
created_at
updated_at

44. Suggested Technology

Option 1

Laravel

Backend:
Laravel

Frontend:
Blade
Tailwind CSS
Alpine.js

Database:
MySQL

Storage:
Local Storage atau S3 Compatible Storage

Option 2

Next.js

Frontend:
Next.js

UI:
Tailwind CSS

Animation:
Framer Motion

Database:
PostgreSQL

ORM:
Prisma

Authentication:
NextAuth atau custom admin authentication.

45. Recommended Stack

Untuk website wedding sederhana:

Laravel
Blade
Tailwind CSS
Alpine.js
MySQL

Stack ini cukup untuk:

Wedding page.
RSVP.
Guestbook.
Guest management.
Admin dashboard.
Gallery.
Wedding settings.

46. Project Structure

Contoh Laravel:

app/
Controllers/
Models/
Services/

resources/
views/
wedding/
admin/

css/
js/

public/
images/
music/

routes/
web.php

47. Environment Configuration

.env

APP_NAME="Bowo Riska Wedding"

APP_ENV=production

APP_DEBUG=false

APP_URL=https://domain.com

DB_CONNECTION=mysql

DB_HOST=

DB_DATABASE=

DB_USERNAME=

DB_PASSWORD=

48. UI Sections Order

Urutan halaman:

Cover Invitation

Hero

Wedding Quote

Bride & Groom

Countdown

Wedding Event

Location

Love Story

Gallery

Video

RSVP

Wedding Gift

Guestbook

Closing

49. Closing Section

Konten:

Thank You

For being part of our special day.

With Love,

Bowo & Riska

16 August 2026

Tambahkan foto penutup.

50. Footer

Contoh:

Bowo & Riska

16.08.2026

Made with love.

Jangan terlalu menonjolkan branding developer.

51. User Experience Rules

Setiap fitur harus dicek di mobile.

Jangan membuat tombol terlalu kecil.

Jangan menggunakan font terlalu kecil.

Jangan menggunakan animasi berat.

Jangan membuat video autoplay.

Musik hanya dimulai setelah user interaction.

Gallery menggunakan lazy loading.

Tidak boleh ada horizontal scroll.

Tidak boleh ada layout yang rusak pada layar 320px.

52. Browser Support

Wajib mendukung versi modern:

Chrome

Safari

Edge

Firefox

Android Chrome

iOS Safari

53. MVP Features

Fitur MVP:

Invitation cover

Guest personalization

Hero section

Bride & Groom

Wedding event

Countdown

Google Maps

Gallery

Background music

RSVP

Wedding Gift

Guestbook

Responsive design

Admin dashboard

Guest management

54. Phase 2 Features

Fitur tambahan:

QRIS gift

Video pre-wedding

Invitation analytics

WhatsApp invitation generator

QR code invitation

Multiple themes

Custom domain

Photo upload dashboard

Excel guest import

Guest check-in

Digital guestbook

55. Future Development

Sistem dapat dikembangkan menjadi Wedding Invitation Platform.

Admin dapat membuat banyak wedding invitation.

Struktur:

users

weddings

wedding_guests

wedding_rsvps

wedding_galleries

wedding_settings

Dengan konsep:

1 Account

Multiple Weddings

Multiple Themes

Custom Domain

56. Success Criteria

Project dianggap selesai jika:

Website responsive di mobile dan desktop.

Semua informasi acara tampil benar.

Guest name dari URL bekerja.

Countdown bekerja.

Google Maps bekerja.

RSVP tersimpan ke database.

Guestbook tersimpan.

Wedding Gift copy account bekerja.

Background music bekerja setelah Open Invitation.

Gallery tampil cepat.

Admin dapat mengelola tamu.

Admin dapat melihat RSVP.

Website menggunakan HTTPS.

Tidak ada console error.

Lighthouse performance minimal 90 pada kondisi production yang wajar.

57. AI Development Rules

Sebelum membuat atau mengubah kode, AI wajib membaca PRD.md.

Setiap task harus dibandingkan dengan requirement di PRD.md.

AI tidak boleh menghapus fitur yang tercantum di PRD.md tanpa instruksi user.

Jika terdapat konflik antara kode existing dengan PRD.md, PRD.md menjadi acuan utama.

Setelah menyelesaikan task, AI harus melakukan pengecekan:

Apakah fitur sesuai PRD.md?

Apakah responsive?

Apakah mobile-first?

Apakah terdapat error?

Apakah security validation sudah diterapkan?

Apakah perubahan merusak fitur lain?

AI harus mempertahankan design direction:

Elegant.
Professional.
Luxury.
Clean.
Responsive.
Mobile-first.

58. Definition of Done

Sebuah task dianggap selesai jika:

Requirement sudah diimplementasikan.

Desktop sudah diuji.

Mobile sudah diuji.

Tidak terdapat error JavaScript.

Tidak terdapat backend error.

Database migration berjalan.

Input memiliki validation.

UI sesuai design system.

Fitur tidak merusak existing functionality.

Requirement sesuai PRD.md.
