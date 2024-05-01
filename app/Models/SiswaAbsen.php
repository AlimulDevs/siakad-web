<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaAbsen extends Model
{
    protected $fillable = [
        'siswa_id',
        'absen_id',
        'is_absen',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
    use HasFactory;
}
