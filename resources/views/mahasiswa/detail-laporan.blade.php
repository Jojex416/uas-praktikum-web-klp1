@extends('layouts.app')

@section('title', 'Detail Laporan')
@section('user_name', 'Aulia Rahma')
@section('user_role', 'Mahasiswa')

@section('sidebar')
    @include('components.sidebar-mahasiswa')
@endsection

@section('content')
<div>
    <div class="mb-6">
        <a href="{{ route('mahasiswa.dashboard') }}" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-700 font-medium">
            <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Detail Laporan -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="p-6 border-b border-gray-100">
                    <h1 class="text-2xl font-bold text-gray-800">AC Ruang 201 Tidak Dingin</h1>
                    <div class="flex flex-wrap gap-3 mt-3">
                        <span class="status-menunggu">Menunggu</span>
                        <span class="text-sm text-gray-500"><i class="far fa-calendar-alt mr-1"></i> Dibuat: 15 Januari 2025</span>
                        <span class="text-sm text-gray-500"><i class="fas fa-map-marker-alt mr-1"></i> Ruang Kelas 201</span>
                    </div>
                </div>
                
                <div class="p-6 space-y-5">
                    <div>
                        <h3 class="font-semibold text-gray-700 mb-1">Kategori</h3>
                        <p class="text-gray-600">AC</p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-700 mb-1">Deskripsi</h3>
                        <p class="text-gray-600 leading-relaxed">AC di ruang kelas 201 tidak mengeluarkan udara dingin sejak 3 hari yang lalu. Sudah dicoba mengganti remote namun tetap tidak dingin. Suhu ruangan menjadi sangat panas dan mengganggu proses belajar mengajar.</p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-700 mb-2">Foto Kerusakan</h3>
                        <div class="bg-gray-100 rounded-xl p-4 text-center">
                            <i class="fas fa-image text-5xl text-gray-400 mb-2"></i>
                            <p class="text-gray-500 text-sm">Belum ada foto yang diupload</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Timeline Status -->
        <div>
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="font-semibold text-gray-700 mb-5">Timeline Status</h3>
                
                <div class="relative">
                    <!-- Timeline 1 -->
                    <div class="flex gap-4 mb-6">
                        <div class="flex flex-col items-center">
                            <div class="w-9 h-9 bg-amber-500 rounded-full flex items-center justify-center text-white shadow-sm">
                                <i class="fas fa-flag-checkered text-sm"></i>
                            </div>
                            <div class="w-0.5 h-12 bg-gray-200 mt-1"></div>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800">Laporan Dibuat</p>
                            <p class="text-xs text-gray-500 mt-0.5">15 Januari 2025, 10:30</p>
                            <p class="text-sm text-gray-500 mt-1">Status: <span class="text-amber-600 font-medium">Menunggu</span></p>
                        </div>
                    </div>
                    
                    <!-- Timeline 2 -->
                    <div class="flex gap-4 mb-6">
                        <div class="flex flex-col items-center">
                            <div class="w-9 h-9 bg-blue-500 rounded-full flex items-center justify-center text-white shadow-sm">
                                <i class="fas fa-tools text-sm"></i>
                            </div>
                            <div class="w-0.5 h-12 bg-gray-200 mt-1"></div>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800">Sedang Diproses</p>
                            <p class="text-xs text-gray-500 mt-0.5">16 Januari 2025, 09:15</p>
                            <p class="text-sm text-gray-500 mt-1">Status: <span class="text-blue-600 font-medium">Diproses</span> oleh Teknisi</p>
                        </div>
                    </div>
                    
                    <!-- Timeline 3 -->
                    <div class="flex gap-4 opacity-50">
                        <div>
                            <div class="w-9 h-9 bg-gray-300 rounded-full flex items-center justify-center text-white">
                                <i class="fas fa-check text-sm"></i>
                            </div>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-500">Selesai</p>
                            <p class="text-xs text-gray-400 mt-0.5">Belum selesai</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection