@extends('layouts.app')

@section('title', 'Login')

@section('sidebar')
    {{-- No sidebar di halaman login --}}
@endsection

@section('content')
<div class="min-h-[80vh] flex items-center justify-center">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-8">
        <!-- Logo -->
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-gradient-to-r from-blue-600 to-blue-700 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                <i class="fas fa-clipboard-list text-3xl text-white"></i>
            </div>
            <h1 class="text-2xl font-bold text-gray-800">LaporKampus</h1>
            <p class="text-gray-500 text-sm mt-1">Sistem Pelaporan Fasilitas Kampus</p>
        </div>

        <!-- Form Login -->
        <form method="POST" action="{{ route('login') }}" id="loginForm">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-medium mb-2">Email / Username</label>
                <div class="relative">
                    <i class="fas fa-envelope absolute left-3 top-3.5 text-gray-400 text-sm"></i>
                    <input type="text" name="username" id="username" 
                           class="w-full pl-10 pr-3 py-2.5 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                           placeholder="Masukkan email atau username">
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-medium mb-2">Password</label>
                <div class="relative">
                    <i class="fas fa-lock absolute left-3 top-3.5 text-gray-400 text-sm"></i>
                    <input type="password" name="password" id="password" 
                           class="w-full pl-10 pr-10 py-2.5 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                           placeholder="Masukkan password">
                    <button type="button" id="togglePassword" class="absolute right-3 top-3.5 text-gray-400 hover:text-gray-600">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>

            <div class="flex items-center justify-between mb-6">
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="remember" class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                    <span class="text-sm text-gray-600">Ingat Saya</span>
                </label>
                <a href="#" class="text-sm text-blue-600 hover:underline">Lupa Password?</a>
            </div>

            <button type="submit" id="btnLogin" 
                    class="w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white py-2.5 rounded-xl hover:from-blue-700 hover:to-blue-800 transition font-medium shadow-sm">
                <i class="fas fa-sign-in-alt mr-2"></i> Masuk
            </button>
        </form>

        <div class="mt-6 text-center">
            <p class="text-sm text-gray-500">
                Belum punya akun? 
                <a href="{{ route('register') }}" class="text-blue-600 font-medium hover:underline">Daftar Sekarang</a>
            </p>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.getElementById('togglePassword')?.addEventListener('click', function() {
        const password = document.getElementById('password');
        const icon = this.querySelector('i');
        if (password.type === 'password') {
            password.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            password.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });

    document.getElementById('loginForm')?.addEventListener('submit', function(e) {
        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;
        if (!username || !password) {
            e.preventDefault();
            Swal.fire('Error', 'Harap isi email/username dan password!', 'error');
        }
    });
</script>
@endpush
@endsection