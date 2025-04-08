<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LaboratSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Nara Vidyasari',
            'email' => 'nara.vidyasari@meditalk.com',
            'password' => Hash::make('laborat123.'),
            'role' => 'laborat',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::create([
            'name' => 'Raditya Maheswara',
            'email' => 'raditya.maheswara@meditalk.com',
            'password' => Hash::make('laborat123.'),
            'role' => 'laborat',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::create([
            'name' => 'Tasya Amadea',
            'email' => 'tasya.amadea@meditalk.com',
            'password' => Hash::make('laborat123.'),
            'role' => 'laborat',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
