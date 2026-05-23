@extends('layouts.app')

@section('title', 'Detail Laporan - Teknisi')
@section('user_name', 'Blenvilo Jonathan')
@section('user_role', 'Teknisi')

@section('sidebar')
    @include('components.sidebar-teknisi')
@endsection

@section('content')
<div>
    <div class="mb-6">
        <a href="{{ route('teknisi.dashboard') }}" class="inline-flex items-center gap-2 text-emerald-600 hover:text-emerald-700 font-medium">
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
                        <span class="status-menunggu" id="statusBadge">Menunggu</span>
                        <span class="text-sm text-gray-500"><i class="far fa-calendar-alt mr-1"></i> Dibuat: 15 Januari 2025</span>
                        <span class="text-sm text-gray-500"><i class="fas fa-user mr-1"></i> Pelapor: Aulia Rahma</span>
                    </div>
                </div>
                
                <div class="p-6 space-y-5">
                    <div>
                        <h3 class="font-semibold text-gray-700 mb-1">Lokasi</h3>
                        <p class="text-gray-600">Ruang Kelas 201</p>
                    </div>
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

        <!-- Form Update Status -->
        <div>
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="font-semibold text-gray-700 mb-5">Update Status Laporan</h3>
                
                <div class="mb-5">
                    <label class="block text-gray-700 font-medium mb-2">Status Saat Ini</label>
                    <select id="updateStatus" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <option value="Menunggu" selected>Menunggu</option>
                        <option value="Diproses">Diproses</option>
                        <option value="Selesai">Selesai</option>
                    </select>
                </div>

                <div class="mb-5">
                    <label class="block text-gray-700 font-medium mb-2">Catatan Teknisi (Opsional)</label>
                    <textarea id="catatan" rows="4" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-emerald-500" placeholder="Tambahkan catatan..."></textarea>
                </div>

                <button onclick="updateStatus()" class="w-full bg-gradient-to-r from-emerald-600 to-emerald-700 text-white py-2.5 rounded-xl hover:from-emerald-700 hover:to-emerald-800 transition font-medium shadow-sm">
                    <i class="fas fa-save mr-2"></i> Update Status
                </button>
            </div>

            <!-- Timeline -->
            <div class="bg-white rounded-xl shadow-sm p-6 mt-6">
                <h3 class="font-semibold text-gray-700 mb-5">Riwayat Status</h3>
                <div class="space-y-4">
                    <div class="flex gap-3">
                        <div class="w-8 h-8 bg-amber-500 rounded-full flex items-center justify-center text-white text-xs">1</div>
                        <div>
                            <p class="font-medium text-gray-800">Dibuat</p>
                            <p class="text-xs text-gray-500">15 Jan 2025 - Status: Menunggu</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function updateStatus() {
        const newStatus = document.getElementById('updateStatus').value;
        const catatan = document.getElementById('catatan').value;
        
        let statusClass = '';
        if (newStatus === 'Menunggu') statusClass = 'status-menunggu';
        else if (newStatus === 'Diproses') statusClass = 'status-diproses';
        else statusClass = 'status-selesai';
        
        document.getElementById('statusBadge').innerHTML = newStatus;
        document.getElementById('statusBadge').className = statusClass;
        
        Swal.fire({
            icon: 'success',
            title: 'Status Berhasil Diupdate',
            text: catatan ? `Catatan: ${catatan}` : 'Status laporan telah diperbarui',
            confirmButtonColor: '#10B981'
        });
    }
</script>
@endpush
@endsection