<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManifestDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'manifests_id','id_datapengiriman', 'status'
    ];

    public function datapengiriman()
    {
      return $this->belongsTo('App\Models\DataPengirimanPaket' ,'id_datapengiriman','id');
    }
}
