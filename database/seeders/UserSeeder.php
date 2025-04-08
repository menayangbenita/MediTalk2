<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Siti Aminah',
                'email' => 'siti@example.com',
                'password' => Hash::make('demo123.'),
                'role' => 'pasien',
            ],
            [
                'name' => 'Budi Santoso',
                'email' => 'budi@example.com',
                'password' => Hash::make('demo123.'),
                'role' => 'pasien',
            ],
            [
                'name' => 'Agus Prabowo',
                'email' => 'agus@example.com',
                'password' => Hash::make('demo123.'),
                'role' => 'pasien',
            ],
            [
                'name' => 'Rina Kartika',
                'email' => 'rina@example.com',
                'password' => Hash::make('demo123.'),
                'role' => 'pasien',
            ],
            [
                'name' => 'Dewi Lestari',
                'email' => 'dewi@example.com',
                'password' => Hash::make('demo123.'),
                'role' => 'pasien',
            ],
            [
                'name' => 'Superadmin',
                'email' => 'admin@meditalk.com',
                'password' => Hash::make('superadmin123.'), 
                'role' => 'superadmin',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
