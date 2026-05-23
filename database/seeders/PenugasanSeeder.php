<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenugasanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('penugasans')->insert([
            [
                'laporan_id' => 1,
                'teknisi_id' => 1,
                'catatan' => 'Segera diperiksa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'laporan_id' => 2,
                'teknisi_id' => 1,
                'catatan' => 'Menunggu alat pengganti',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}