<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{

    protected $table = 'tugas';
    protected $fillable = [
        'jadwal_id',
        'title',
        'description',
        'deadline',
    ];
    use HasFactory;
}
