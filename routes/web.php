<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\TeknisiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. Halaman Utama / Landing Page (Welcome)
Route::get('/', [HomeController::class, 'index'])->name('welcome');

// 2. Rute Autentikasi (Login, Register, Logout)
// 2. Rute Autentikasi (Login, Register, Logout)
Route::middleware('guest')->group(function () {
    // KITA UBAH DI SINI: Langsung panggil view 'auth.login' dan 'auth.register' tanpa lewat HomeController
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');
    
    Route::post('/login', [HomeController::class, 'login']);
    
    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');
    
    Route::post('/register', [HomeController::class, 'register']);
});

Route::post('/logout', [HomeController::class, 'logout'])->name('logout')->middleware('auth');


// 3. Rute yang Membutuhkan Login (Protected Routes)
Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | PANEL MAHASISWA (Prefix: mahasiswa, Name: mahasiswa.*)
    |--------------------------------------------------------------------------
    |*/
    Route::prefix('mahasiswa')->name('mahasiswa.')->group(function () {
        // Halaman Dashboard Mahasiswa
        Route::get('/dashboard', [MahasiswaController::class, 'dashboard'])->name('dashboard');
        
        // Form Pembuatan Laporan Baru
        Route::get('/laporan/baru', [MahasiswaController::class, 'create'])->name('buat-laporan');
        
        // Proses Penyimpanan Laporan ke Database
        Route::post('/laporan/simpan', [MahasiswaController::class, 'store'])->name('store');
        
        // Halaman Detail Laporan Milik Mahasiswa
        Route::get('/laporan/{id}', [MahasiswaController::class, 'show'])->name('detail-laporan');
    });

    /*
    |--------------------------------------------------------------------------
    | PANEL TEKNISI (Prefix: teknisi, Name: teknisi.*)
    |--------------------------------------------------------------------------
    |*/
    Route::prefix('teknisi')->name('teknisi.')->group(function () {
        // Halaman Dashboard Teknisi (Menampilkan Statistik & Daftar Semua Laporan)
        Route::get('/dashboard', [TeknisiController::class, 'dashboard'])->name('dashboard');
        
        // Menu "Semua Laporan" (Sesuai dengan tag href yang ada di sidebar-teknisi.blade.php)
        Route::get('/laporan', [TeknisiController::class, 'dashboard'])->name('laporan');
        
        // Halaman Detail Kendala / Laporan untuk Diperiksa Teknisi
        Route::get('/laporan/{id}', [TeknisiController::class, 'show'])->name('detail-laporan');
        
        // Aksi Update Status & Catatan Kerja Teknisi (Menggunakan PUT karena memperbarui data)
        Route::put('/laporan/{id}/update', [TeknisiController::class, 'updateStatus'])->name('update-status');
    });

});

/*
|--------------------------------------------------------------------------
| PENYELAMAT REDIRECT NYASAR (Pencegahan Error 404 pada Laravel 11)
|--------------------------------------------------------------------------
| Kode di bawah ini menangkap pengalihan otomatis internal Laravel 11 
| dan mengarahkannya secara pintar sesuai dengan Role pengguna.
*/
Route::get('/dashboard', function () {
    if (Auth::check()) {
        if (Auth::user()->role === 'teknisi') {
            return redirect()->route('teknisi.dashboard');
        }
        return redirect()->route('mahasiswa.dashboard');
    }
    return redirect()->route('login');
})->middleware('auth');

Route::get('/home', function () {
    return redirect('/dashboard');
});