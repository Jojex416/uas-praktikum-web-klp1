@extends('layouts.app')

@section('title', 'Register')

@section('sidebar')
@endsection

@section('content')
<div class="min-h-[80vh] flex items-center justify-center">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-8">
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-gradient-to-r from-blue-600 to-blue-700 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                <i class="fas fa-user-plus text-3xl text-white"></i>
            </div>
            <h1 class="text-2xl font-bold text-gray-800">Daftar Akun</h1>
            <p class="text-gray-500 text-sm mt-1">Buat akun mahasiswa baru</p>
        </div>

        <form method="POST" action="{{ route('register') }}" id="registerForm">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-medium mb-2">Nama Lengkap</label>
                <div class="relative">
                    <i class="fas fa-user absolute left-3 top-3.5 text-gray-400 text-sm"></i>
                    <input type="text" name="name" id="name" 
                           class="w-full pl-10 pr-3 py-2.5 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                           placeholder="Masukkan nama lengkap">
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                <div class="relative">
                    <i class="fas fa-envelope absolute left-3 top-3.5 text-gray-400 text-sm"></i>
                    <input type="email" name="email" id="email" 
                           class="w-full pl-10 pr-3 py-2.5 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                           placeholder="contoh: mahasiswa@email.com">
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-medium mb-2">Password</label>
                <div class="relative">
                    <i class="fas fa-lock absolute left-3 top-3.5 text-gray-400 text-sm"></i>
                    <input type="password" name="password" id="password" 
                           class="w-full pl-10 pr-10 py-2.5 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                           placeholder="Minimal 6 karakter">
                    <button type="button" id="togglePassword" class="absolute right-3 top-3.5 text-gray-400">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-medium mb-2">Konfirmasi Password</label>
                <div class="relative">
                    <i class="fas fa-lock absolute left-3 top-3.5 text-gray-400 text-sm"></i>
                    <input type="password" name="password_confirmation" id="password_confirmation" 
                           class="w-full pl-10 pr-3 py-2.5 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                           placeholder="Ulangi password">
                </div>
            </div>

            <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white py-2.5 rounded-xl hover:from-blue-700 hover:to-blue-800 transition font-medium shadow-sm">
                <i class="fas fa-user-plus mr-2"></i> Daftar
            </button>
        </form>

        <div class="mt-6 text-center">
            <p class="text-sm text-gray-500">
                Sudah punya akun? 
                <a href="{{ route('login') }}" class="text-blue-600 font-medium hover:underline">Masuk Sekarang</a>
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

    document.getElementById('registerForm')?.addEventListener('submit', function(e) {
        const password = document.getElementById('password').value;
        const confirm = document.getElementById('password_confirmation').value;
        if (password !== confirm) {
            e.preventDefault();
            Swal.fire('Error', 'Password dan konfirmasi password tidak sama!', 'error');
        }
    });
</script>
@endpush
@endsection