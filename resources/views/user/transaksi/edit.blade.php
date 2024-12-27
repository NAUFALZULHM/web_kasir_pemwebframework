@extends('user.layouts.wrapper')

@section('content')
<div class="container">
    <h1>{{ $title }}</h1>
    <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
        @csrf
        @method('PUT')
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi_detail as $detail)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $detail->produk_name }}</td>
                    <td>
                        <input type="number" name="qty[{{ $detail->id }}]" value="{{ $detail->qty }}" class="form-control">
                    </td>
                    <td>{{ $detail->subtotal }}</td>
                    <td>
                        <a href="{{ route('transaksi_detail.delete', $detail->id) }}" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i> Hapus
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Update Transaksi</button>
        <a href="{{ route('transaksi.selesai', $transaksi->id) }}" class="btn btn-success">Selesaikan Transaksi</a>
    </form>
</div>
@endsection
