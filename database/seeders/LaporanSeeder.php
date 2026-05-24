<?php

namespace Database\Seeders;

use App\Models\Laporan;
use App\Models\User;
use Illuminate\Database\Seeder;

class LaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil ID user mahasiswa yang pertama (Aulia Rahma dari DatabaseSeeder)
        $mahasiswa = User::where('role', 'mahasiswa')->first();
        $userId = $mahasiswa ? $mahasiswa->id : 1;

        Laporan::create([
            'user_id'   => $userId,
            'judul'     => 'AC Mati di Ruang D201',
            'lokasi'    => 'Ruang Kelas 201',
            'kategori'  => 'AC',          // PERBAIKAN: Menggunakan string sesuai tabelmu
            'deskripsi' => 'AC tidak menyala sejak pagi, ruangan terasa sangat panas.',
            'foto'      => null,
            'status'    => 'Menunggu',    // PERBAIKAN: Menggunakan string sesuai tabelmu
        ]);

        Laporan::create([
            'user_id'   => $userId,
            'judul'     => 'Lampu Lorong Mati',
            'lokasi'    => 'Area Parkir',
            'kategori'  => 'Lampu',       // PERBAIKAN: Menggunakan string sesuai tabelmu
            'deskripsi' => 'Lampu lorong dekat parkiran mati total jika malam hari.',
            'foto'      => null,
            'status'    => 'Diproses',    // PERBAIKAN: Menggunakan string sesuai tabelmu
        ]);
    }
}