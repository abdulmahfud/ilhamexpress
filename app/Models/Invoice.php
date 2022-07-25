<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user_admin','date', 'due_date','id_user','potongan','total_bayar','keterangan'
    ];
    
    public function users()
    {
      return $this->belongsTo('App\Models\User' ,'id_user_admin','id');
    }
    public function client()
    {
      return $this->belongsTo('App\Models\Client' ,'id_user','id');
    }


}
