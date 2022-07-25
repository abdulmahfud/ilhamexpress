<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPengirimanPaket extends Model
{
    
    use HasFactory;
    protected $fillable = [
            'id_user',
            'tgl_kirim',
            'origin_id',
            'pengirim_id',
            'penerima_id'
            ,'nomor_resi'
           ,'panjang'
           ,'lebar'
           ,'tinggi'
           ,'berat'
           ,'jumlah'
          ,'total_biaya'
            ,'keterangan'
           , 'service'
            ,'status'
    ];
    protected $searchableColumns = ['nomor_resi'];
    public function penerima(){
      return $this->belongsTo('App\Models\Client',  'penerima_id', 'id');
    }
    public function origin(){
      return $this->belongsTo('App\Models\Origin',  'origin_id', 'id');
    }
  public function pengirim(){
    return $this->belongsTo('App\Models\Client',  'pengirim_id', 'id');
}
}
