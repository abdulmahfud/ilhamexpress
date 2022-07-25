<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manifest extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_manifest','nama_driver', 'no_hp','tujuan','tgl_kirim','status'
    ];

  
}

