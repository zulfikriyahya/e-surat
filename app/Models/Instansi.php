<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    use HasFactory;

    protected $fillable = [
        'institusi',
        'subinstitusi',
        'instansi',
        'status',
        'akreditasi',
        'alamat',
        'kepala_instansi',
        'nip_kepala',
        'website',
        'email',
        'telepon',
        'logo_institusi',
        'logo_instansi',
        'tte',
    ];

    protected $casts = [
        'id' => 'integer',
    ];
}
