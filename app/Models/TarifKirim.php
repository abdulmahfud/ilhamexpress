<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarifKirim extends Model
{
    use HasFactory;
    protected $fillable = [
        'origin_id', 'tujuan','nama_kabupaten_penerima','nama_kecamatan_penerima','layanan','min_kg','max_kg','tarif' 
    ];
    public function origin()
    {
      return $this->belongsTo('App\Models\Origin' ,'origin_id','id');
    }
}
