<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama','email','no_hp','nama_kecamatan','nama_kabupaten','nama_provinsi'
        ,'nama_desa','kodepos','alamat','countries_id'
    ];
    public function country()
    {
      return $this->belongsTo('App\Models\Country' ,'countries_id','id');
    }
}
