<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klasifikasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode',
        'deskripsi',
        'kategori',
    ];
    protected $casts = [
        'id' => 'integer',
    ];
}
