<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatIbadah extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_tempat',
        'alamat',
        'jenis_ibadah',
        'latitude',
        'longitude',
        'gambar'
    ];
}
