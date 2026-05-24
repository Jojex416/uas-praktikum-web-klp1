<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Akun Mahasiswa
        User::create([
            'name' => 'Aulia Rahma',
            'email' => 'aulia@student.com',
            'password' => Hash::make('password123'),
            'role' => 'mahasiswa',
        ]);

        // 2. Buat Akun Teknisi
        User::create([
            'name' => 'Blenvilo Jonathan',
            'email' => 'blenvilo@teknisi.com',
            'password' => Hash::make('password123'),
            'role' => 'teknisi',
        ]);

        // 3. Panggil LaporanSeeder yang baru kita perbaiki
        $this->call([
            LaporanSeeder::class,
        ]);
    }
}