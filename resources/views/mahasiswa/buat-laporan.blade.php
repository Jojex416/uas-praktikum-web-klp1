@extends('layouts.app')

@section('title', 'Buat Laporan')

{{-- Mengambil Nama & Role Pengguna Secara Dinamis dari Data Login Akun --}}
@section('user_name', Auth::user()->name ?? 'Mahasiswa')
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
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-sm p-6">
                {{-- PERBAIKAN: Menambahkan ID Form dan Enctype untuk Support Upload File --}}
                <form id="laporanForm" enctype="multipart/form-data">
                    <div class="mb-5">
                        <label class="block text-gray-700 font-medium mb-2">Judul Laporan <span class="text-red-500">*</span></label>
                        {{-- PERBAIKAN: Menambahkan atribut name="judul" --}}
                        <input type="text" id="judul" name="judul" 
                               class="w-full border border-gray-200 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                               placeholder="Contoh: AC Ruang 201 Tidak Dingin">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Lokasi Kerusakan <span class="text-red-500">*</span></label>
                            {{-- PERBAIKAN: Menambahkan atribut name="lokasi" --}}
                            <select id="lokasi" name="lokasi" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">Pilih Lokasi</option>
                                <option value="Ruang Kelas 101">Ruang Kelas 101</option>
                                <option value="Ruang Kelas 102">Ruang Kelas 102</option>
                                <option value="Ruang Kelas 201">Ruang Kelas 201</option>
                                <option value="Lab Komputer A">Lab Komputer A</option>
                                <option value="Lab Komputer B">Lab Komputer B</option>
                                <option value="Lab Bahasa">Lab Bahasa</option>
                                <option value="Perpustakaan">Perpustakaan</option>
                                <option value="Kantin">Kantin</option>
                                <option value="Toilet Lantai 1">Toilet Lantai 1</option>
                                <option value="Toilet Lantai 2">Toilet Lantai 2</option>
                                <option value="Area Parkir">Area Parkir</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Kategori Kerusakan <span class="text-red-500">*</span></label>
                            {{-- PERBAIKAN: Menambahkan atribut name="kategori" --}}
                            <select id="kategori" name="kategori" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">Pilih Kategori</option>
                                <option value="AC">AC</option>
                                <option value="Lampu">Lampu</option>
                                <option value="Kursi">Kursi</option>
                                <option value="Proyektor">Proyektor</option>
                                <option value="Toilet">Toilet</option>
                                <option value="Meja">Meja</option>
                                <option value="Wifi">Wifi</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-5">
                        <label class="block text-gray-700 font-medium mb-2">Deskripsi Kerusakan <span class="text-red-500">*</span></label>
                        {{-- PERBAIKAN: Menambahkan atribut name="deskripsi" --}}
                        <textarea id="deskripsi" name="deskripsi" rows="5" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                                  placeholder="Jelaskan secara detail kerusakan yang terjadi..."></textarea>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 font-medium mb-2">Upload Foto (Opsional)</label>
                        <div class="border-2 border-dashed border-gray-300 rounded-xl p-5 text-center hover:border-blue-400 transition cursor-pointer" onclick="document.getElementById('foto').click()">
                            {{-- PERBAIKAN: Menambahkan atribut name="foto" --}}
                            <input type="file" id="foto" name="foto" accept="image/*" class="hidden" onchange="previewFoto(this)">
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
    
    // PERBAIKAN UTAMA: Mengirimkan Data via Fetch API (AJAX) ke Backend Laravel
    function submitLaporan() {
        const judul = document.getElementById('judul').value;
        const lokasi = document.getElementById('lokasi').value;
        const kategori = document.getElementById('kategori').value;
        const deskripsi = document.getElementById('deskripsi').value;
        
        // Validasi Frontend Sederhana
        if (!judul || !lokasi || !kategori || !deskripsi) {
            Swal.fire('Error', 'Harap lengkapi semua field yang wajib diisi!', 'error');
            return;
        }

        // Tampilkan loading spinner saat memproses data
        Swal.fire({
            title: 'Mohon Tunggu',
            text: 'Sedang mengirimkan laporan...',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading()
            }
        });

        // Kumpulkan data menggunakan FormData (Mendukung pengiriman berkas/file gambar)
        const formElement = document.getElementById('laporanForm');
        const formData = new FormData(formElement);

        // Ambil token keamanan CSRF dari meta tag bawaan layouts/app.blade.php
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Menembak Route: mahasiswa.store
        fetch("{{ route('mahasiswa.store') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": csrfToken
            },
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Terjadi kesalahan jaringan atau server.');
            }
            return response.json();
        })
        .then(data => {
            if(data.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Laporan Berhasil Dikirim!',
                    text: data.message,
                    confirmButtonColor: '#2563EB'
                }).then(() => {
                    // Berhasil simpan, arahkan kembali ke panel utama mahasiswa
                    window.location.href = "{{ route('mahasiswa.dashboard') }}";
                });
            } else {
                Swal.fire('Gagal', 'Gagal memproses pembuatan laporan.', 'error');
            }
        })
        .catch(error => {
            console.error(error);
            Swal.fire('Error', 'Terjadi kesalahan sistem, pastikan data yang diinput benar.', 'error');
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