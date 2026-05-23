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
        Schema::create('penugasans', function (Blueprint $table) {
            $table->id();
                        // Relasi ke laporan
            $table->foreignId('laporan_id')
                ->constrained()
                ->onDelete('cascade');

            // Relasi ke user (teknisi)
            $table->foreignId('teknisi_id')
                ->constrained('users')
                ->onDelete('cascade');

            // Catatan tambahan dari admin/teknisi
            $table->text('catatan')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penugasans');
    }
};
