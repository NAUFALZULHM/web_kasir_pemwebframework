@extends('user.layouts.wrapper')

@section('content')
<div class="container">
    <h1>Nota Transaksi</h1>
    <p><strong>ID Transaksi:</strong> {{ $transaksi->id }}</p>
    <p><strong>Kasir:</strong> {{ $transaksi->kasir_name }}</p>
    <p><strong>Total:</strong> Rp{{ $transaksi->total }}</p>
    <hr>
    <h2>Detail Transaksi</h2>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Produk</th>
                <th>Qty</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi->details as $detail)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $detail->produk_name }}</td>
                <td>{{ $detail->qty }}</td>
                <td>{{ $detail->subtotal }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
