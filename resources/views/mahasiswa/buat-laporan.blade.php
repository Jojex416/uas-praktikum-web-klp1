@extends('layouts.app')

@section('title', 'Buat Laporan')
@section('user_name', 'Aulia Rahma')
@section('user_role', 'Mahasiswa')

@section('sidebar')
    @include('components.sidebar-mahasiswa')
@endsection

@section('content')
<div>
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Buat Laporan Baru</h1>
        <p class="text-gray-500 mt-1">Laporkan kerusakan fasilitas kampus dengan lengkap dan jelas</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Form -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-sm p-6">
                <form id="laporanForm">
                    <div class="mb-5">
                        <label class="block text-gray-700 font-medium mb-2">Judul Laporan <span class="text-red-500">*</span></label>
                        <input type="text" id="judul" 
                               class="w-full border border-gray-200 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                               placeholder="Contoh: AC Ruang 201 Tidak Dingin">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Lokasi Kerusakan <span class="text-red-500">*</span></label>
                            <select id="lokasi" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">Pilih Lokasi</option>
                                <option>Ruang Kelas 101</option>
                                <option>Ruang Kelas 102</option>
                                <option>Ruang Kelas 201</option>
                                <option>Lab Komputer A</option>
                                <option>Lab Komputer B</option>
                                <option>Lab Bahasa</option>
                                <option>Perpustakaan</option>
                                <option>Kantin</option>
                                <option>Toilet Lantai 1</option>
                                <option>Toilet Lantai 2</option>
                                <option>Area Parkir</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Kategori Kerusakan <span class="text-red-500">*</span></label>
                            <select id="kategori" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">Pilih Kategori</option>
                                <option>AC</option>
                                <option>Lampu</option>
                                <option>Kursi</option>
                                <option>Proyektor</option>
                                <option>Toilet</option>
                                <option>Meja</option>
                                <option>Wifi</option>
                                <option>Lainnya</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-5">
                        <label class="block text-gray-700 font-medium mb-2">Deskripsi Kerusakan <span class="text-red-500">*</span></label>
                        <textarea id="deskripsi" rows="5" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                                  placeholder="Jelaskan secara detail kerusakan yang terjadi..."></textarea>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 font-medium mb-2">Upload Foto (Opsional)</label>
                        <div class="border-2 border-dashed border-gray-300 rounded-xl p-5 text-center hover:border-blue-400 transition cursor-pointer" onclick="document.getElementById('foto').click()">
                            <input type="file" id="foto" accept="image/*" class="hidden" onchange="previewFoto(this)">
                            <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
                            <p class="text-gray-500 text-sm">Klik untuk upload atau drag and drop</p>
                            <p class="text-gray-400 text-xs mt-1">Maksimal 2MB (JPG, PNG)</p>
                        </div>
                    </div>

                    <div class="flex gap-3">
                        <button type="button" onclick="submitLaporan()" class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-6 py-2.5 rounded-xl hover:from-blue-700 hover:to-blue-800 transition font-medium shadow-sm">
                            <i class="fas fa-paper-plane mr-2"></i> Submit Laporan
                        </button>
                        <button type="button" onclick="resetForm()" class="bg-gray-100 text-gray-600 px-6 py-2.5 rounded-xl hover:bg-gray-200 transition font-medium">
                            <i class="fas fa-undo mr-2"></i> Reset
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Preview Foto -->
        <div>
            <div class="bg-white rounded-xl shadow-sm p-6 sticky top-24">
                <h3 class="font-semibold text-gray-700 mb-3">Preview Foto</h3>
                <div id="previewContainer" class="bg-gray-50 rounded-xl h-56 flex items-center justify-center border border-gray-200">
                    <div class="text-center text-gray-400">
                        <i class="fas fa-image text-4xl mb-2"></i>
                        <p class="text-sm">Belum ada foto</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function previewFoto(input) {
        const container = document.getElementById('previewContainer');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                container.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover rounded-xl">`;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    function submitLaporan() {
        const judul = document.getElementById('judul').value;
        const lokasi = document.getElementById('lokasi').value;
        const kategori = document.getElementById('kategori').value;
        const deskripsi = document.getElementById('deskripsi').value;
        
        if (!judul || !lokasi || !kategori || !deskripsi) {
            Swal.fire('Error', 'Harap lengkapi semua field yang wajib diisi!', 'error');
            return;
        }
        
        Swal.fire({
            icon: 'success',
            title: 'Laporan Berhasil Dikirim!',
            text: 'Laporan Anda akan segera diproses oleh teknisi.',
            confirmButtonColor: '#2563EB'
        }).then(() => {
            window.location.href = "{{ route('mahasiswa.dashboard') }}";
        });
    }
    
    function resetForm() {
        document.getElementById('laporanForm').reset();
        document.getElementById('previewContainer').innerHTML = `
            <div class="text-center text-gray-400">
                <i class="fas fa-image text-4xl mb-2"></i>
                <p class="text-sm">Belum ada foto</p>
            </div>
        `;
    }
</script>
@endpush
@endsection