<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarifInternasional extends Model
{
    use HasFactory;
    protected $fillable = [
        'courires_id', 
        'origin_id',
        'countries_id',
        'min',
        'max',
        'cost' 
    ];

    public function courires()
    {
      return $this->belongsTo('App\Models\courier' ,'courires_id','id');
    }
    public function origin()
    {
      return $this->belongsTo('App\Models\Origin' ,'origin_id','id');
    }
    public function countries()
    {
      return $this->belongsTo('App\Models\Country' ,'countries_id','id');
    }
}
 