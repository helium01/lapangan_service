<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lapangan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_lapangan',
        'alamat',
        'deskripsi_lapangan',
        'lang',
        'long',
    ];
}
