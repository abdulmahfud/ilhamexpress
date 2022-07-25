<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi_debit_kredit extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'tgl_input',
        'keterangan',
        'jenis_saldo',
        'jumlah',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User',  'id_user', 'id');
    }

    // public function jenis_akun(){
    //     return $this->belongsTo('App\Models\Jenis_akun', 'jenis_akun_id', 'id');
    // }
}
