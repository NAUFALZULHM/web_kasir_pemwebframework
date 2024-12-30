<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = ['produk_id', 'produk_name', 'transaksi_id', 'qty', 'subtotal'];
    protected $table = 'transaksi_details'; // Nama tabel transaksi_detail
    protected $primaryKey = 'id';   // Primary key tabel transaksi_detail

    // Relasi dengan Produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }

    // Method untuk mengambil semua detail berdasarkan transaksi_id
    public static function getAllById($id)
    {
        return self::where('transaksi_id', $id)->get();
    }
}
