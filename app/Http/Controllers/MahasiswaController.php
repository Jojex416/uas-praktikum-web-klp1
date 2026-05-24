<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    // Menampilkan Dashboard Mahasiswa (Daftar laporan milik mahasiswa yang sedang login)
    public function dashboard()
    {
        // Mengambil data laporan khusus milik user yang sedang login saat ini
        $laporans = Laporan::where('user_id', Auth::id())->latest()->get();

        return view('mahasiswa.dashboard', compact('laporans'));
    }

    // Menampilkan Form Pembuatan Laporan Baru
    public function create()
    {
        return view('mahasiswa.buat-laporan');
    }

    // Memproses Penyimpanan Data Laporan Baru via AJAX/JSON
    public function store(Request $request)
    {
        // 1. Validasi Input data dari form request
        $request->validate([
            'judul' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'kategori' => 'required|string',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048' // Jika ada fitur upload foto
        ]);

        // 2. Logika upload file foto (opsional, jika diimplementasikan)
        $namaFoto = null;
        if ($request->hasFile('foto')) {
            $namaFoto = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('uploads/laporan'), $namaFoto);
        }

        // 3. Simpan ke Database menggunakan Eloquent ORM
        Laporan::create([
            'user_id' => Auth::id(), // Menghubungkan laporan ke mahasiswa yang login
            'judul' => $request->judul,
            'lokasi' => $request->lokasi,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'foto' => $namaFoto,
            'status' => 'Menunggu', // Status default saat laporan pertama kali dibuat
        ]);

        // 4. Mengembalikan respon JSON agar dibaca oleh SweetAlert di file buat-laporan.blade.php
        return response()->json([
            'success' => true,
            'message' => 'Laporan Anda berhasil dikirim ke sistem!'
        ]);
    }

    // Menampilkan Detail Laporan Spesifik untuk Mahasiswa
    public function show($id)
    {
        // Mengambil data laporan berdasarkan ID atau memicu error 404 jika tidak ditemukan
        $laporan = Laporan::where('user_id', Auth::id())->findOrFail($id);

        return view('mahasiswa.detail-laporan', compact('laporan'));
    }
}