<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | USER DUMMY
        |--------------------------------------------------------------------------
        */

        // Admin
        User::create([
            'name' => 'Admin Kampus',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // Teknisi
        User::create([
            'name' => 'Teknisi Kampus',
            'email' => 'teknisi@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'teknisi',
        ]);

        // Mahasiswa
        User::create([
            'name' => 'Mahasiswa',
            'email' => 'mahasiswa@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'mahasiswa',
        ]);

        /*
        |--------------------------------------------------------------------------
        | PANGGIL SEEDER LAIN
        |--------------------------------------------------------------------------
        */

        $this->call([
            KategoriSeeder::class,
            StatusSeeder::class,
            LaporanSeeder::class,
            PenugasanSeeder::class,
        ]);
    }
}