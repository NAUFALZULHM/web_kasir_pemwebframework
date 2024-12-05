<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    
    use HasFactory;

    protected $guarded = [];
    protected $fillable = ['produk_id', 'produk_name', 'transaksi_id', 'qty', 'subtotal'];
    protected $table = 'transaksi_details'; // Ganti dengan nama tabel Anda
    protected $primaryKey = 'id';   // Ganti dengan nama primary key jika bukan 'id'
    

   
    public static function getAllById($id){
        return self::where('transaksi_id', $id)->get();}


}

