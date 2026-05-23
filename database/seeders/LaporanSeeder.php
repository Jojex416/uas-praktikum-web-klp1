<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('laporans')->insert([
            [
                'user_id' => 1,
                'kategori_id' => 1,
                'status_id' => 1,
                'judul' => 'AC Mati di Ruang D201',
                'lokasi' => 'Gedung D Ruang 201',
                'deskripsi' => 'AC tidak menyala sejak pagi',
                'foto' => 'ac-rusak.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'kategori_id' => 2,
                'status_id' => 2,
                'judul' => 'Lampu Mati',
                'lokasi' => 'Lorong Gedung A',
                'deskripsi' => 'Lampu lorong mati total',
                'foto' => 'lampu-rusak.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}