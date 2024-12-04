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
        // $data = $request->validate([
        //     'produk_id' => 'required|exists:produk_id',
        //     'produk_name' => 'required|string',
        //     'transaksi_id' => 'required|exists:transaksi,id',
        //     'qty' => 'required|integer|min:1',
        //     'subtotal' => 'required|numeric|min:1',
        // ]);
        // TransaksiDetail::create($data);
        // return redirect()->back();
        
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

    public function show($transaksi_id)
    {
        $transaksi_detail = TransaksiDetail::where('transaksi_id', $transaksi_id)->get();
        return view('transaksi.detail', compact('transaksi_detail'));
    }

}
