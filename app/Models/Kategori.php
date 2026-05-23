<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    // Satu kategori memiliki banyak laporan
    public function laporan()
    {
        return $this->hasMany(Laporan::class);
    }

    protected $fillable = [
        'nama_kategori',
        'deskripsi'
    ];
}
