<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoices_id','nama_barang', 'deskripsi','harga','qty','sub_total'
    ];
}
