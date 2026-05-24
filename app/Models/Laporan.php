<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'judul',
        'lokasi',
        'kategori',
        'deskripsi',
        'foto',
        'status',
        'catatan_teknisi',
    ];

    // Relasi balik ke model User (Mengetahui siapa mahasiswa yang membuat laporan)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}