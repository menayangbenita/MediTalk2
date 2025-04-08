<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Models\User;

class DokterSeeder extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');

        foreach (range(1, 5) as $i) {
            $user = User::create([
                'name' => $faker->name('male'),
                'email' => 'dokter' . $i . '@example.com',
                'password' => bcrypt('dokter123.'), 
                'role' => 'dokter',
            ]);
        
            DB::table('dokters')->insert([
                'user_id' => $user->id,
                'nama' => $user->name,
                'spesialis' => $faker->randomElement(['Bedah Plastik', 'Bedah Anak', 'Anak']),
                'alumnus' => 'Universitas Indonesia',
                'str' => 'STR' . $faker->unique()->numerify('##########'),
                'tempat_praktik' => 'RS Mitra Sehat',
                'mulai_praktik' => Carbon::now()->subYears(rand(1, 10))->year,
                'tarif' => rand(100000, 200000),
                'maksimal_chat' => rand(1, 4),
                'status' => $faker->randomElement(['aktif', 'tidak']),
                'foto' => 'dokter'.$i.'.png',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
