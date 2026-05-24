<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeknisiController extends Controller
{
    // Menampilkan halaman dashboard teknisi (daftar semua laporan masuk)
    public function dashboard()
    {
        // $laporan = Laporan::all();
        
        return view('teknisi.dashboard');
    }

    // Menampilkan detail laporan untuk ditindaklanjuti oleh teknisi
    public function show($id)
    {
        // $laporan = Laporan::findOrFail($id);
        
        return view('teknisi.detail-laporan');
    }

    // (Opsional) Mengubah status laporan (misal: Selesai / Diproses)
    public function updateStatus(Request $request, $id)
    {
        // Logic mengubah status laporan
        return redirect()->back()->with('success', 'Status laporan berhasil diperbarui!');
    }
}