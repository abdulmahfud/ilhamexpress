<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengirimanTrackingmore extends Model
{
    use HasFactory;
protected $fillable = [
        'origin_id',
        'pengirim_id',
        'penerima_id',
        'courires_id',
        'typepaket_id',
        'countries_id',
        'tgl_kirim',
        'tracking_number',
        'order_number',
        'logistics_channel',
        'keterangan',
        'panjang',
        'lebar',
         'tinggi',
         'jumlah',
         'berat',
         'total_biaya',
        'status',

];


        public function penerima(){
        return $this->belongsTo('App\Models\Client',  'penerima_id', 'id');
        }
        public function courier(){
                return $this->belongsTo('App\Models\courier',  'courires_id', 'id');
                }
        public function origin(){
        return $this->belongsTo('App\Models\Origin',  'origin_id', 'id');
        }
        public function pengirim(){
        return $this->belongsTo('App\Models\Client',  'pengirim_id', 'id');
        }
        public function country()
        {
          return $this->belongsTo('App\Models\Country' ,'countries_id','id');
        }
        public function typepaket()
        {
          return $this->belongsTo('App\Models\Typepaket' ,'typepaket_id','id');
        }

        
}
