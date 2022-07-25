<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Gajikaryawan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'tgl_gaji',
        'nama_karyawan',
        'bonus',
        'potongan',
        'gaji_pokok',
        'total_gaji',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User',  'id_user', 'id');
    }
}
