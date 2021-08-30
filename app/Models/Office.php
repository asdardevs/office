<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'email',
        'fakultas_id',
        'prodi_id',
        'file',
        'token',
        'username',
        'password',
        'pesan',
        'status',
        'kategori',
        'no_identitas',
    ];

    public function prodi()
    {
        return $this->belongsTo(Major::class, 'prodi_id', 'kode_jurusan');
    }
    public function fakultas()
    {
        return $this->belongsTo(Faculty::class, 'fakultas_id', 'kode_fakultas');
    }



}
