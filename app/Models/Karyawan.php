<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user', 'nik','nama_lengkap','alamat','no_hp','jabatan'
    ];
    public function users()
    {
      return $this->belongsTo('App\Models\User' ,'id_user','id');
      }

}
