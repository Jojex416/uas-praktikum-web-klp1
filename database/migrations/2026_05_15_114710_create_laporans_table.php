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
        Schema::create('laporans', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->unsignedBigInteger()->onDelete('cascade'); // <-- Ini sudah bikin foreign key otomatis
    $table->string('judul');
    $table->string('lokasi');
    $table->string('kategori');
    $table->text('deskripsi');
    $table->string('foto')->nullable();
    $table->enum('status', ['Menunggu', 'Diproses', 'Selesai'])->default('Menunggu');
    $table->text('catatan_teknisi')->nullable();
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
