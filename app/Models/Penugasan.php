<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penugasan extends Model
{
     // Penugasan milik satu laporan
    public function laporan()
    {
        return $this->belongsTo(Laporan::class);
    }

    // Penugasan dimiliki oleh satu teknisi
    public function teknisi()
    {
        return $this->belongsTo(User::class, 'teknisi_id');
    }

     // Nama tabel
    protected $table = 'penugasans';

    /*
    |--------------------------------------------------------------------------
    | Kolom yang boleh diisi
    |--------------------------------------------------------------------------
    */

    protected $fillable = [
        'laporan_id',
        'teknisi_id',
        'catatan'
    ];

}
