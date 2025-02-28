<?php

namespace App\Http\Controllers;
use App\Models\TransaksiDetail;
use App\Models\Produk;
use App\Models\Transaksi;
// use App\Http\Controllers\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;


class UserTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = [
            'title' => 'Manajemen Transaksi',
            'transaksi' => Transaksi::orderBy('created_at','DESC')->paginate(10),
            'content' => 'user/transaksi/index'
        ];
        return view('user.layouts.wrapper', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $data = [
            'user_id' => auth()->user()->id,
            'kasir_name' => auth()->user()->name,
            'total' => 0,
        ];
        $transaksi = Transaksi::create($data);
        return redirect(route('transaksi.edit', ['transaksi' => $transaksi->id]));
    
    }
    public function hapusSemua()
    {
        try {
            // Menghapus semua transaksi dan detailnya
            \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            Transaksi::truncate(); // Hapus tabel transaksi
            TransaksiDetail::truncate(); // Hapus tabel detail transaksi
            \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            // Redirect ke halaman transaksi dengan pesan sukses
            return redirect()->route('transaksi.index')->with('success', 'Semua transaksi berhasil dihapus.');
        } catch (\Exception $e) {
            // Tangani error
            return redirect()->route('transaksi.index')->with('error', 'Terjadi kesalahan saat menghapus transaksi: ' . $e->getMessage());
        }
    }


    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
            //
        $transaksi = Transaksi::findOrFail($id);
        $transaksi_details = TransaksiDetail::where('transaksi_id', $id)->get();

        return view('user.transaksi.create', [
            'transaksi' => $transaksi,
            'produk' => Produk::all(),
            'transaksi_detail' => $transaksi_details,
            'p_detail' => null,
            'qty' => 1,
            'subtotal' => 0,
        ]);
    }

    public function nota($id)
    {
        $transaksi = Transaksi::with('details.produk')->find($id);

        if (!$transaksi) {
            abort(404, 'Transaksi tidak ditemukan');
        }

        // // Periksa isi relasi produk
        // dump($transaksi->details->first()->produk);

        return view('user.layouts.wrapper', [
            'content' => 'user.transaksi.nota',
            'transaksi' => $transaksi,
        ]);
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $produk = Produk::get();

        $produk_id = request('produk_id');
        $p_detail = null;
        // Validasi jika produk_id tidak kosong
        if ($produk_id) {
            $p_detail = Produk::find($produk_id);
            if (!$p_detail) {
                // Produk tidak ditemukan
                return back()->with('error', 'Produk tidak ditemukan');
            }
        }

        $transaksi_detail = TransaksiDetail::getAllById($id);

        $act = request('act');
        $qty = request('qty');
        if ($act == 'min') {
            if ($qty <= 1) {
                $qty = 1;
            } else {
                $qty = $qty - 1;
            }
        } else {
            $qty = $qty + 1;
        }

        // Menghitung subtotal (jika produk ditemukan)
        $subtotal = $p_detail ? $qty * $p_detail->harga : 0;

        $transaksi = Transaksi::find($id);

        $dibayarkan = request('dibayarkan');
        $kembalian = $dibayarkan - $transaksi->total;
        $data = [
            'title' => 'Tambah Transaksi',
            'produk' => $produk,
            'p_detail' => $p_detail,
            'qty' => $qty,
            'subtotal' => $subtotal,
            'transaksi_detail' => $transaksi_detail,
            'transaksi' => $transaksi,
            'kembalian' => $kembalian,
            'content' => 'user/transaksi/create'
        ];
        return view('user.layouts.wrapper', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
