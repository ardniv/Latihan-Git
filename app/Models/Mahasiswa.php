<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table='data_siswa';

    protected $primaryKey = 'nrp';

    protected $fillable = [
        'nrp', 'nama', 'jurusan', 'email'
    ];

}
