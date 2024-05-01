<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaktuJadwal extends Model
{
    protected $fillable = [
        'jadwal_id',
        'hari',
        'jam_awal',
        'jam_akhir',
    ];
    use HasFactory;
}
