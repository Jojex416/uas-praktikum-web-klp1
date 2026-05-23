<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategoris')->insert([
            [
                'nama_kategori' => 'AC',
                'deskripsi' => 'Kerusakan pendingin ruangan',
            ],
            [
                'nama_kategori' => 'Lampu',
                'deskripsi' => 'Lampu mati atau rusak',
            ],
            [
                'nama_kategori' => 'Wifi',
                'deskripsi' => 'Gangguan jaringan internet',
            ],
            [
                'nama_kategori' => 'Toilet',
                'deskripsi' => 'Kerusakan fasilitas toilet',
            ],
            [
                'nama_kategori' => 'Proyektor',
                'deskripsi' => 'Kerusakan alat proyektor',
            ],
        ]);
    }
}