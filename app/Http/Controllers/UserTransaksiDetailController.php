<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserTransaksiDetailController extends Controller
{
    //
    function create(Request $request)
    {
        // die('masuk');
        $data = [
            'produk_id' => $request->produk_id,
            'transaksi_id' => $request->transaksi_id,
        ];
    }
}
