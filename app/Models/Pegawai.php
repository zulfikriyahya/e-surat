<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nama',
        'nik',
        'nip',
        'nuptk',
        'jabatan_id',
        'foto',
        'alamat',
        'email',
        'telepon',
        'status',
        'isAktif',
    ];
    protected $casts = [
        'id' => 'integer',
    ];
    public function jabatan(): BelongsTo
    {
        return $this->belongsTo(Jabatan::class);
    }
}
