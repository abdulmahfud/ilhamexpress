<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarifptiga extends Model
{
    use HasFactory;
    protected $fillable = [
        'origin_id', 'city_origin','city_destination','courier','weight','cost'
    ];
    public function origin()
    {
      return $this->belongsTo('App\Models\Origin' ,'origin_id','id');
    }
}
