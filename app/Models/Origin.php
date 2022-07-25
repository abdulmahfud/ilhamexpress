<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Origin extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_lokasi', 'nama_kecamatan_pengirim','nama_kabupaten_pengirim','nama_provinsi_pengirim'  
    ];
}
