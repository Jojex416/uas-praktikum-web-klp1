@extends('layouts.app')

@section('title', 'Dashboard Teknisi')
@section('user_name', 'Blenvilo Jonathan')
@section('user_role', 'Teknisi')

@section('sidebar')
    @include('components.sidebar-teknisi')
@endsection

@section('content')
<div>
    <!-- Welcome -->
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Dashboard Teknisi 🔧</h1>
        <p class="text-gray-500 mt-1">Kelola dan tracking laporan kerusakan fasilitas kampus</p>
    </div>

    <!-- Stat Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-5 mb-8">
        <div class="bg-white rounded-xl p-5 shadow-sm border-l-4 border-gray-500 card-hover transition">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-gray-600 text-sm font-medium">Total Laporan</p>
                    <p class="text-3xl font-bold text-gray-800 mt-1">10</p>
                </div>
                <div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-clipboard-list text-gray-500 text-xl"></i>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-5 shadow-sm border-l-4 border-amber-500 card-hover transition">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-amber-600 text-sm font-medium">Menunggu</p>
                    <p class="text-3xl font-bold text-gray-800 mt-1">3</p>
                </div>
                <div class="w-12 h-12 bg-amber-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-clock text-amber-500 text-xl"></i>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-5 shadow-sm border-l-4 border-blue-500 card-hover transition">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-blue-600 text-sm font-medium">Diproses</p>
                    <p class="text-3xl font-bold text-gray-800 mt-1">2</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-spinner fa-pulse text-blue-500 text-xl"></i>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-5 shadow-sm border-l-4 border-emerald-500 card-hover transition">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-emerald-600 text-sm font-medium">Selesai</p>
                    <p class="text-3xl font-bold text-gray-800 mt-1">5</p>
                </div>
                <div class="w-12 h-12 bg-emerald-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-check-circle text-emerald-500 text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter -->
    <div class="bg-white rounded-xl shadow-sm p-4 mb-6">
        <div class="flex flex-wrap gap-3">
            <select id="filterStatus" class="border border-gray-200 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                <option value="">Semua Status</option>
                <option>Menunggu</option>
                <option>Diproses</option>
                <option>Selesai</option>
            </select>
            <select id="filterKategori" class="border border-gray-200 rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                <option value="">Semua Kategori</option>
                <option>AC</option>
                <option>Lampu</option>
                <option>Kursi</option>
                <option>Proyektor</option>
                <option>Toilet</option>
                <option>Meja</option>
                <option>Wifi</option>
            </select>
            <div class="flex-1 min-w-[200px]">
                <div class="relative">
                    <i class="fas fa-search absolute left-3 top-2.5 text-gray-400 text-sm"></i>
                    <input type="text" id="searchInput" placeholder="Cari laporan..." 
                           class="w-full pl-9 pr-3 py-2 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Laporan -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100">
                        <th class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Judul Laporan</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Mahasiswa</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Lokasi</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Kategori</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Status</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    <tr class="hover:bg-gray-50">
                        <td class="px-5 py-3 font-medium text-gray-800">AC Ruang 201 Tidak Dingin</td>
                        <td class="px-5 py-3 text-gray-600">Aulia Rahma</td>
                        <td class="px-5 py-3 text-gray-600">Ruang 201</td>
                        <td class="px-5 py-3 text-gray-600">AC</td>
                        <td class="px-5 py-3"><span class="status-menunggu">Menunggu</span></td>
                        <td class="px-5 py-3">
                            <a href="{{ route('teknisi.detail-laporan', 1) }}" class="text-emerald-600 hover:text-emerald-700 font-medium text-sm">
                                <i class="fas fa-edit mr-1"></i> Detail
                            </a>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-5 py-3 font-medium text-gray-800">Lampu Mati Lab Komputer</td>
                        <td class="px-5 py-3 text-gray-600">Amminia Putri</td>
                        <td class="px-5 py-3 text-gray-600">Lab A</td>
                        <td class="px-5 py-3 text-gray-600">Lampu</td>
                        <td class="px-5 py-3"><span class="status-diproses">Diproses</span></td>
                        <td class="px-5 py-3">
                            <a href="{{ route('teknisi.detail-laporan', 2) }}" class="text-emerald-600 hover:text-emerald-700 font-medium text-sm">
                                <i class="fas fa-edit mr-1"></i> Detail
                            </a>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-5 py-3 font-medium text-gray-800">Proyektor Ruang 101 Rusak</td>
                        <td class="px-5 py-3 text-gray-600">Aulia Rahma</td>
                        <td class="px-5 py-3 text-gray-600">Ruang 101</td>
                        <td class="px-5 py-3 text-gray-600">Proyektor</td>
                        <td class="px-5 py-3"><span class="status-selesai">Selesai</span></td>
                        <td class="px-5 py-3">
                            <a href="{{ route('teknisi.detail-laporan', 3) }}" class="text-emerald-600 hover:text-emerald-700 font-medium text-sm">
                                <i class="fas fa-eye mr-1"></i> Detail
                            </a>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-5 py-3 font-medium text-gray-800">Kursi Perpustakaan Patah</td>
                        <td class="px-5 py-3 text-gray-600">Amminia Putri</td>
                        <td class="px-5 py-3 text-gray-600">Perpustakaan</td>
                        <td class="px-5 py-3 text-gray-600">Kursi</td>
                        <td class="px-5 py-3"><span class="status-menunggu">Menunggu</span></td>
                        <td class="px-5 py-3">
                            <a href="{{ route('teknisi.detail-laporan', 4) }}" class="text-emerald-600 hover:text-emerald-700 font-medium text-sm">
                                <i class="fas fa-edit mr-1"></i> Detail
                            </a>
                        </td>
                    </tr>
                </tbody>
             </table>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.getElementById('filterStatus')?.addEventListener('change', function() {
        // Filter logic by backend
    });
    document.getElementById('filterKategori')?.addEventListener('change', function() {
        // Filter logic by backend
    });
    document.getElementById('searchInput')?.addEventListener('keyup', function() {
        // Search logic by backend
    });
</script>
@endpush
@endsection