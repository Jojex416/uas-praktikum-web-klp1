<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    // 1. Menampilkan halaman utama / landing page (welcome.blade.php)
    public function index()
    {
        return view('welcome');
    }

    // 2. Menampilkan Form Login (auth/login.blade.php)
    public function showLogin()
    {
        return view('auth.login');
    }

    // 3. Menampilkan Form Registrasi (auth/register.blade.php)
    public function showRegister()
    {
        return view('auth.register');
    }

    // 4. Memproses Aksi Login Pengguna
    public function login(Request $request)
    {
        // Validasi input sesuai dengan atribut 'name' di form login
        $credentials = $request->validate([
            'username' => 'required|string', 
            'password' => 'required|string',
        ]);

        // Memetakan 'username' dari form menjadi 'email' sesuai kolom di database
        $loginData = [
            'email' => $credentials['username'],
            'password' => $credentials['password']
        ];

        if (Auth::attempt($loginData)) {
            $request->session()->regenerate();

            // Redirect Multi-Role berdasarkan data kolom 'role' di tabel users
            if (Auth::user()->role === 'teknisi') {
                return redirect()->route('teknisi.dashboard');
            }

            return redirect()->route('mahasiswa.dashboard');
        }

        // Jika login gagal, kembalikan dengan pesan error
        return back()->withErrors([
            'username' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('username');
    }

    // 5. Memproses Pendaftaran Akun Mahasiswa Baru
    public function register(Request $request)
    {
        // Validasi input form register
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|email|max:255|unique:users,email', 
            'password' => 'required|string|min:8|confirmed', // Harus ada input password_confirmation di form
        ]);

        // Simpan data user ke database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 'mahasiswa', // Default pendaftaran otomatis menjadi mahasiswa
        ]);

        // Otomatis login setelah berhasil mendaftar
        Auth::login($user);

        return redirect()->route('mahasiswa.dashboard')->with('success', 'Akun berhasil dibuat!');
    }

    // 6. Memproses Aksi Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}