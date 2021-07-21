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
        'akun',
        'pesan',
        'status',
    ];
}
