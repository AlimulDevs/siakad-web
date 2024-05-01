<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{

    protected $fillable = [
        'jadwal_id',
        'hari',
        'tanggal',
        'jam_masuk',
        'jam_keluar'
    ];

    public function siswa_absen()
    {
        return $this->hasMany(SiswaAbsen::class);
    }
    use HasFactory;
}
