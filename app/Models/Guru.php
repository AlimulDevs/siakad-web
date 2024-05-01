<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $fillable = [
        'nip',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}
