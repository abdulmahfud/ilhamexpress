<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackingPtiga extends Model
{
    use HasFactory;
    protected $fillable = [
        'pengirimanptigas_id', 'no_resi','keterangan','status_pengiriman' 
    ];
    public function pengirimanptiga()
    {
      return $this->belongsTo('App\Models\Pengirimanptiga' ,'pengirimanptigas_id','id');
    }
}
