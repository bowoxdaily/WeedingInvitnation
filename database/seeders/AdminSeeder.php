<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::updateOrCreate(
            ['email' => 'admin@wedding.com'],
            [
                'name'     => 'Admin Wedding',
                'email'    => 'admin@wedding.com',
                'password' => Hash::make('wedding2026'),
            ]
        );
    }
}

