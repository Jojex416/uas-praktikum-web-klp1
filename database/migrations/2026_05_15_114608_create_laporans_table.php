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
                        /*
            |--------------------------------------------------------------------------
            | FOREIGN KEY
            |--------------------------------------------------------------------------
            */

            // User yang membuat laporan
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            // Kategori kerusakan
            $table->foreignId('kategori_id')
                ->constrained('kategoris')
                ->onDelete('cascade');

            // Status laporan
            $table->foreignId('status_id')
                ->constrained('statuses')
                ->onDelete('cascade');

            /*
            |--------------------------------------------------------------------------
            | DATA LAPORAN
            |--------------------------------------------------------------------------
            */

            // Judul laporan
            $table->string('judul');

            // Lokasi kerusakan
            $table->string('lokasi');

            // Deskripsi kerusakan
            $table->text('deskripsi');

            // Upload foto
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
