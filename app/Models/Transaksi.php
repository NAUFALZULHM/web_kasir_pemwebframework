<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = [
        'user_id',
        'kasir_name',
        'total',
        'status',
    ];

    // Relasi ke TransaksiDetail
    public function details()
    {
        return $this->hasMany(TransaksiDetail::class, 'transaksi_id');
    }
}

