<?php

namespace App\Http\Controllers;
use App\Models\TransaksiDetail;
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

        if($td == null) {
            $data = [
                'produk_id' => $produk_id,
                'produk_name' => $request->produk_name,
                'transaksi_id' => $request->transaksi_id,
                'qty' => $request->qty,
                'subtotal' => $request->subtotal,
            ];
            TransaksiDetail::create($data);
        }else{
            $data = [
                'qty' => $td->qty + $request->qty,
                'subtotal' => $request->subtotal + $td->subtotal,
            ];
            $td->update($data);
        }
        return redirect('transaksi/'.$transaksi_id.'/edit');
    }

    // public function show($transaksi_id)
    // {
    //     $transaksi_detail = TransaksiDetail::where('transaksi_id', $transaksi_id)->get();
    //     dd($transaksi_detail); // Debug data
    //     return view('transaksi.detail', compact('transaksi_detail'));
    // }

}
