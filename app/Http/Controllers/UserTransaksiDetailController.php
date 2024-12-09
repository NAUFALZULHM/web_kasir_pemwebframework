<?php

namespace App\Http\Controllers;
use App\Models\TransaksiDetail;
use App\Models\Transaksi;
use App\Models\Produk;
use Illuminate\Http\Request;

class UserTransaksiDetailController extends Controller
{
    //
    public function create(Request $request)
    {
        // die('masuk');
        // dd($request->all());
        $produk_id = $request->produk_id;
        $transaksi_id = $request->transaksi_id;

        $td = TransaksiDetail::whereProdukId($produk_id)->whereTransaksiId($transaksi_id)->first();

        $transaksi = Transaksi::find($transaksi_id);
        
        if($td == null) {
            $data = [
                'produk_id' => $produk_id,
                'produk_name' => $request->produk_name,
                'transaksi_id' => $request->transaksi_id,
                'qty' => $request->qty,
                'subtotal' => $request->subtotal,
            ];
            TransaksiDetail::create($data);

            $td = [
                'total' => $request->subtotal + $transaksi->total,
            ];
            $transaksi->update($td);
        }else{
            $data = [
                'qty' => $td->qty + $request->qty,
                'subtotal' => $request->subtotal + $td->subtotal,
            ];
            $td->update($data);

            $td = [
                'total' => $request->subtotal + $transaksi->total,
            ];
            $transaksi->update($td);
        }
        return redirect('transaksi/'.$transaksi_id.'/edit');
    }
}
