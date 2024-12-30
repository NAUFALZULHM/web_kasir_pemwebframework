<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $guarded =[];


    // Relasi dengan TransaksiDetail
    public function transaksiDetails()
    {
        return $this->hasMany(TransaksiDetail::class, 'produk_id');
    }

}
