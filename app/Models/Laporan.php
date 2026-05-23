<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    // Laporan dimiliki oleh user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Laporan memiliki kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    // Laporan memiliki status
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    // Laporan memiliki banyak penugasan
    public function penugasan()
    {
        return $this->hasMany(Penugasan::class);
    }

     // Nama tabel
    protected $table = 'laporans';

    /*
    |--------------------------------------------------------------------------
    | Kolom yang boleh diisi
    |--------------------------------------------------------------------------
    */

    protected $fillable = [
        'user_id',
        'kategori_id',
        'status_id',
        'judul',
        'lokasi',
        'deskripsi',
        'foto'
    ];
}
