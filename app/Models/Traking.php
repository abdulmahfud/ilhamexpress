<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traking extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user'
        ,'id_manifest'
        ,'id_datapengiriman'
        ,'no_resi'
        ,'dokumen'
        ,'catatan'
        ,'nama_penerima'
        ,'nohp_penerima'
        ,'status'
    ];
}
