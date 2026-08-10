<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // Couple Info
            'groom_name'            => 'Bowo Prasetyo',
            'groom_nickname'        => 'Bowo',
            'groom_father'          => 'Bapak Suharto',
            'groom_mother'          => 'Ibu Sunarti',
            'groom_instagram'       => '@bowo_prasetyo',
            'groom_photo'           => '/images/placeholder-groom.jpg',

            'bride_name'            => 'Riska Anggraeni',
            'bride_nickname'        => 'Riska',
            'bride_father'          => 'Bapak Suparman',
            'bride_mother'          => 'Ibu Hartini',
            'bride_instagram'       => '@riska_anggraeni',
            'bride_photo'           => '/images/placeholder-bride.jpg',
            'whatsapp_number'       => '628123456789',

            // Event
            'wedding_date'          => '16 Agustus 2026',
            'wedding_date_en'       => '16 August 2026',
            'wedding_date_iso'      => '2026-08-16',

            'akad_time'             => '08.00 - 10.00 WIB',
            'akad_venue'            => 'Masjid Al-Ikhlas',
            'akad_address'          => 'Jl. Contoh No. 123, Kota, Provinsi',
            'akad_maps_url'         => 'https://maps.google.com',

            'reception_time'        => '11.00 - 14.00 WIB',
            'reception_venue'       => 'Gedung Serbaguna Indah',
            'reception_address'     => 'Jl. Contoh No. 456, Kota, Provinsi',
            'reception_maps_url'    => 'https://maps.google.com',

            'maps_embed_url'        => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d0!2d0!3d0!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0!2s!5e0!3m2!1sid!2sid!4v1234567890',

            // Quote
            'wedding_quote'         => 'A beautiful journey begins with two hearts choosing one path together.',
            'wedding_quote_source'  => '',

            // Love Story
            'love_story'            => json_encode([
                ['year' => '2020', 'title' => 'First Meet', 'description' => 'Kami pertama kali bertemu dan saling mengenal satu sama lain.'],
                ['year' => '2022', 'title' => 'Our Journey', 'description' => 'Perjalanan kami semakin dekat dan kami mulai serius menjalin hubungan.'],
                ['year' => '2025', 'title' => 'Engagement', 'description' => 'Kami resmi bertunangan dan merencanakan hari bahagia bersama.'],
                ['year' => '2026', 'title' => 'Wedding Day', 'description' => 'Our forever begins. 16 August 2026.'],
            ]),

            // Bank Account
            'bank1_name'            => 'BCA',
            'bank1_account_number'  => '1234567890',
            'bank1_account_name'    => 'Bowo Prasetyo',

            'bank2_name'            => 'Mandiri',
            'bank2_account_number'  => '0987654321',
            'bank2_account_name'    => 'Riska Anggraeni',

            // Music
            'music_file'            => '/music/wedding-song.mp3',
            'music_title'           => 'A Thousand Years',

            // Hero Photo
            'hero_photo'            => '/images/placeholder-hero.jpg',
            'closing_photo'         => '/images/placeholder-hero.jpg',
        ];

        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}

