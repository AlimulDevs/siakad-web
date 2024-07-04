<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiAkhir extends Model
{
    protected $table = 'nilai_akhirs';
    protected $fillable = [
        'siswa_id',
        'mata_pelajaran_id',
        'nilai_tugas',
        'nilai_uts',
        'nilai_uas',
        'nilai_akhir',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
    public function mata_pelajaran()
    {
        return $this->belongsTo(MataPelajaran::class);
    }

    use HasFactory;
}
