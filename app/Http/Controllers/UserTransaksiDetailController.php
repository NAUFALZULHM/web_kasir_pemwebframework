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
        $data = [
            'produk_id' => $request->produk_id,
            'produk_name' => $request->produk_name,
            'transaksi_id' => $request->transaksi_id,
            'qty' => $request->qty,
            'subtotal' => $request->subtotal,
        ];
        TransaksiDetail::create($data);
        return redirect()->back();
        

    }

    // public function show($transaksi_id)
    // {
    //     $transaksi_detail = TransaksiDetail::where('transaksi_id', $transaksi_id)->get();
    //     dd($transaksi_detail); // Debug data
    //     return view('transaksi.detail', compact('transaksi_detail'));
    // }

}
