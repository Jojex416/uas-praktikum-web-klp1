<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    // Satu status memiliki banyak laporan
    public function laporan()
    {
        return $this->hasMany(Laporan::class);
    }

    // Nama tabel
    protected $table = 'statuses';

    /*
    |--------------------------------------------------------------------------
    | Kolom yang boleh diisi
    |--------------------------------------------------------------------------
    */

    protected $fillable = [
        'nama_status',
        'keterangan'
    ];
}
