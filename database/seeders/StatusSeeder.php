<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('statuses')->insert([
            [
                'nama_status' => 'Menunggu',
                'keterangan' => 'Laporan baru masuk',
            ],
            [
                'nama_status' => 'Diproses',
                'keterangan' => 'Laporan sedang diperbaiki',
            ],
            [
                'nama_status' => 'Selesai',
                'keterangan' => 'Perbaikan telah selesai',
            ],
            [
                'nama_status' => 'Ditolak',
                'keterangan' => 'Laporan tidak valid',
            ],
        ]);
    }
}