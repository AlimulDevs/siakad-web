<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{

    protected $fillable = [
        'guru_id',
        'kelas_id',
        'hari',
        'mata_pelajaran',
        'jam_awal',
        'jam_akhir',
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function waktu_jadwal()
    {
        return $this->hasMany(WaktuJadwal::class);
    }

    public function absen()
    {
        return $this->hasMany(Absen::class);
    }
    use HasFactory;
}
