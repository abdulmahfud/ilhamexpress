<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_karyawan',
        'tgl',
        'jumlah',
        'status',
        'keterangan',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User',  'id_karyawan', 'id');
    }
}