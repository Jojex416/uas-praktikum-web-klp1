@extends('layouts.app')

@section('title', 'Dashboard Mahasiswa')
@section('user_name', Auth::user()->name ?? 'Mahasiswa')
@section('user_role', 'Mahasiswa')

@section('sidebar')
    @include('components.sidebar-mahasiswa')
@endsection

@section('content')
<div class="space-y-6">
    <!-- Welcome Section -->
    <div class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-2xl p-6 text-white shadow-lg">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold">Selamat Datang, {{ Auth::user()->name ?? 'Mahasiswa' }}! 👋</h1>
                <p class="text-blue-100 mt-1">Pantau dan kelola laporan fasilitas kampus Anda di sini</p>
            </div>
            <div class="bg-white/20 rounded-full p-3 backdrop-blur">
                <i class="fas fa-clipboard-list text-2xl"></i>
            </div>
        </div>
    </div>

    <!-- Stat Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
        <!-- Card Menunggu -->
        <div class="bg-white rounded-xl p-5 shadow-sm hover:shadow-md transition-all duration-300 border-l-4 border-amber-500 group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-amber-600 text-sm font-medium uppercase tracking-wide">Menunggu</p>
                    <p class="text-4xl font-bold text-gray-800 mt-2 group-hover:scale-105 transition">3</p>
                    <p class="text-gray-400 text-xs mt-1">Belum diproses</p>
                </div>
                <div class="w-14 h-14 bg-amber-100 rounded-2xl flex items-center justify-center group-hover:bg-amber-200 transition">
                    <i class="fas fa-clock text-amber-500 text-2xl"></i>
                </div>
            </div>
        </div>

        <!-- Card Diproses -->
        <div class="bg-white rounded-xl p-5 shadow-sm hover:shadow-md transition-all duration-300 border-l-4 border-blue-500 group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-blue-600 text-sm font-medium uppercase tracking-wide">Diproses</p>
                    <p class="text-4xl font-bold text-gray-800 mt-2 group-hover:scale-105 transition">2</p>
                    <p class="text-gray-400 text-xs mt-1">Sedang dikerjakan</p>
                </div>
                <div class="w-14 h-14 bg-blue-100 rounded-2xl flex items-center justify-center group-hover:bg-blue-200 transition">
                    <i class="fas fa-spinner fa-pulse text-blue-500 text-2xl"></i>
                </div>
            </div>
        </div>

        <!-- Card Selesai -->
        <div class="bg-white rounded-xl p-5 shadow-sm hover:shadow-md transition-all duration-300 border-l-4 border-emerald-500 group">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-emerald-600 text-sm font-medium uppercase tracking-wide">Selesai</p>
                    <p class="text-4xl font-bold text-gray-800 mt-2 group-hover:scale-105 transition">5</p>
                    <p class="text-gray-400 text-xs mt-1">Telah diselesaikan</p>
                </div>
                <div class="w-14 h-14 bg-emerald-100 rounded-2xl flex items-center justify-center group-hover:bg-emerald-200 transition">
                    <i class="fas fa-check-circle text-emerald-500 text-2xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Button -->
    <div class="flex justify-between items-center flex-wrap gap-3">
        <a href="{{ route('mahasiswa.buat-laporan') }}" 
           class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-blue-700 text-white px-6 py-3 rounded-xl hover:from-blue-700 hover:to-blue-800 transition-all duration-300 shadow-md hover:shadow-lg font-medium">
            <i class="fas fa-plus-circle text-lg"></i>
            Buat Laporan Baru
        </a>
        
        <!-- Info kecil -->
        <div class="text-sm text-gray-400 bg-white px-4 py-2 rounded-full shadow-sm">
            <i class="fas fa-info-circle mr-1"></i> Total laporan: 10
        </div>
    </div>

    <!-- Filter & Search Card -->
    <div class="bg-white rounded-xl shadow-sm p-5">
        <div class="flex flex-col md:flex-row gap-3">
            <div class="flex-1">
                <div class="relative">
                    <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                    <input type="text" id="searchLaporan" 
                           placeholder="Cari laporan berdasarkan judul atau lokasi..." 
                           class="w-full pl-9 pr-3 py-2.5 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                </div>
            </div>
            <div class="w-full md:w-48">
                <div class="relative">
                    <i class="fas fa-filter absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                    <select id="filterStatus" 
                            class="w-full pl-9 pr-3 py-2.5 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 appearance-none cursor-pointer bg-white">
                        <option value="">Semua Status</option>
                        <option value="Menunggu">Menunggu</option>
                        <option value="Diproses">Diproses</option>
                        <option value="Selesai">Selesai</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Laporan -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            <i class="fas fa-file-alt mr-1"></i> Judul Laporan
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            <i class="fas fa-map-marker-alt mr-1"></i> Lokasi
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            <i class="fas fa-tag mr-1"></i> Kategori
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            <i class="fas fa-chart-line mr-1"></i> Status
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            <i class="fas fa-calendar-alt mr-1"></i> Tanggal
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            <i class="fas fa-cog mr-1"></i> Aksi
                        </th>
                    </tr>
                </thead>
                <tbody id="tabelLaporan" class="divide-y divide-gray-100">
                    <!-- Data Laporan 1 -->
                    <tr class="hover:bg-blue-50/30 transition-all duration-200 group">
                        <td class="px-6 py-4">
                            <span class="font-semibold text-gray-800 group-hover:text-blue-600 transition">AC Ruang 201 Tidak Dingin</span>
                        </td>
                        <td class="px-6 py-4 text-gray-600">Ruang Kelas 201</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 bg-gray-100 rounded-lg text-xs text-gray-600">AC</span>
                        </td>
                        <td class="px-6 py-4"><span class="status-menunggu">Menunggu</span></td>
                        <td class="px-6 py-4 text-gray-500 text-sm">15 Januari 2025</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('mahasiswa.detail-laporan', 1) }}" 
                               class="inline-flex items-center gap-1 text-blue-600 hover:text-blue-800 font-medium text-sm transition">
                                <i class="fas fa-eye"></i> Detail
                            </a>
                        </td>
                    </tr>
                    <!-- Data Laporan 2 -->
                    <tr class="hover:bg-blue-50/30 transition-all duration-200 group">
                        <td class="px-6 py-4">
                            <span class="font-semibold text-gray-800 group-hover:text-blue-600 transition">Lampu Mati di Lab Komputer</span>
                        </td>
                        <td class="px-6 py-4 text-gray-600">Lab Komputer A</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 bg-gray-100 rounded-lg text-xs text-gray-600">Lampu</span>
                        </td>
                        <td class="px-6 py-4"><span class="status-diproses">Diproses</span></td>
                        <td class="px-6 py-4 text-gray-500 text-sm">14 Januari 2025</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('mahasiswa.detail-laporan', 2) }}" 
                               class="inline-flex items-center gap-1 text-blue-600 hover:text-blue-800 font-medium text-sm transition">
                                <i class="fas fa-eye"></i> Detail
                            </a>
                        </td>
                    </tr>
                    <!-- Data Laporan 3 -->
                    <tr class="hover:bg-blue-50/30 transition-all duration-200 group">
                        <td class="px-6 py-4">
                            <span class="font-semibold text-gray-800 group-hover:text-blue-600 transition">Proyektor Ruang 101 Rusak</span>
                        </td>
                        <td class="px-6 py-4 text-gray-600">Ruang Kelas 101</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 bg-gray-100 rounded-lg text-xs text-gray-600">Proyektor</span>
                        </td>
                        <td class="px-6 py-4"><span class="status-selesai">Selesai</span></td>
                        <td class="px-6 py-4 text-gray-500 text-sm">10 Januari 2025</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('mahasiswa.detail-laporan', 3) }}" 
                               class="inline-flex items-center gap-1 text-blue-600 hover:text-blue-800 font-medium text-sm transition">
                                <i class="fas fa-eye"></i> Detail
                            </a>
                        </td>
                    </tr>
                    <!-- Data Laporan 4 -->
                    <tr class="hover:bg-blue-50/30 transition-all duration-200 group">
                        <td class="px-6 py-4">
                            <span class="font-semibold text-gray-800 group-hover:text-blue-600 transition">Kursi Perpustakaan Patah</span>
                        </td>
                        <td class="px-6 py-4 text-gray-600">Perpustakaan</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 bg-gray-100 rounded-lg text-xs text-gray-600">Kursi</span>
                        </td>
                        <td class="px-6 py-4"><span class="status-menunggu">Menunggu</span></td>
                        <td class="px-6 py-4 text-gray-500 text-sm">16 Januari 2025</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('mahasiswa.detail-laporan', 4) }}" 
                               class="inline-flex items-center gap-1 text-blue-600 hover:text-blue-800 font-medium text-sm transition">
                                <i class="fas fa-eye"></i> Detail
                            </a>
                        </td>
                    </tr>
                    <!-- Data Laporan 5 -->
                    <tr class="hover:bg-blue-50/30 transition-all duration-200 group">
                        <td class="px-6 py-4">
                            <span class="font-semibold text-gray-800 group-hover:text-blue-600 transition">Toilet Lantai 2 Mampet</span>
                        </td>
                        <td class="px-6 py-4 text-gray-600">Toilet Lantai 2</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 bg-gray-100 rounded-lg text-xs text-gray-600">Toilet</span>
                        </td>
                        <td class="px-6 py-4"><span class="status-diproses">Diproses</span></td>
                        <td class="px-6 py-4 text-gray-500 text-sm">13 Januari 2025</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('mahasiswa.detail-laporan', 5) }}" 
                               class="inline-flex items-center gap-1 text-blue-600 hover:text-blue-800 font-medium text-sm transition">
                                <i class="fas fa-eye"></i> Detail
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="bg-gray-50 px-6 py-4 border-t border-gray-100 flex justify-between items-center">
            <p class="text-sm text-gray-500">Menampilkan <span class="font-medium">5</span> dari <span class="font-medium">10</span> laporan</p>
            <div class="flex gap-2">
                <button class="px-3 py-1 border border-gray-300 rounded-lg text-gray-500 hover:bg-gray-100 transition disabled:opacity-50" disabled>
                    <i class="fas fa-chevron-left text-xs"></i>
                </button>
                <button class="px-3 py-1 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">1</button>
                <button class="px-3 py-1 border border-gray-300 rounded-lg text-gray-500 hover:bg-gray-100 transition">2</button>
                <button class="px-3 py-1 border border-gray-300 rounded-lg text-gray-500 hover:bg-gray-100 transition">
                    <i class="fas fa-chevron-right text-xs"></i>
                </button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Filter dan Search functionality
    const searchInput = document.getElementById('searchLaporan');
    const filterStatus = document.getElementById('filterStatus');
    const tableRows = document.querySelectorAll('#tabelLaporan tr');
    
    function filterTable() {
        const searchValue = searchInput?.value.toLowerCase() || '';
        const statusValue = filterStatus?.value || '';
        
        tableRows.forEach(row => {
            const judul = row.cells[0]?.innerText.toLowerCase() || '';
            const lokasi = row.cells[1]?.innerText.toLowerCase() || '';
            const status = row.cells[3]?.innerText || '';
            
            const matchSearch = judul.includes(searchValue) || lokasi.includes(searchValue);
            const matchStatus = !statusValue || status === statusValue;
            
            row.style.display = (matchSearch && matchStatus) ? '' : 'none';
        });
    }
    
    searchInput?.addEventListener('keyup', filterTable);
    filterStatus?.addEventListener('change', filterTable);
</script>
@endpush
@endsection