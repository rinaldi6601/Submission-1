<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;
    protected $table = 'karyawan';
    protected $fillable = [
        'karyawan_id',
        'tgl_cuti',
        'lama_cuti',
        'keterangan'
    ];
}
