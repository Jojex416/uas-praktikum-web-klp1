<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Membuat struktur tabel laporans saja (Tanpa ikatan di file ini)
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();

            // Kolom angka biasa
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('kategori_id');
            $table->unsignedBigInteger('status_id');

            /*
            |--------------------------------------------------------------------------
            | DATA LAPORAN
            |--------------------------------------------------------------------------
            */
            $table->string('judul');
            $table->string('lokasi');
            $table->text('deskripsi');
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};