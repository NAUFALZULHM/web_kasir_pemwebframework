<div class="container">
    <h1>Nota Transaksi</h1>
    <p><strong>ID Transaksi:</strong> {{ $transaksi->id }}</p>
    <p><strong>Tanggal:</strong> {{ $transaksi->updated_at }}</p>
    <p><strong>Kasir:</strong> {{ $transaksi->kasir_name }}</p>
    <p><strong>Total:</strong> Rp{{ number_format($transaksi->total, 0, ',', '.') }}</p>
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
            @forelse ($transaksi->details as $detail)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ optional($detail->produk)->name ?? $detail->produk_name }}</td>
                    <td>{{ $detail->qty }}</td>
                    <td>Rp{{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada detail transaksi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <hr>
    <!-- Tombol Print -->
    <button class="btn btn-primary" onclick="printNota()">Print Nota</button>
</div>

<!-- Script untuk fungsi Print -->
<script>
    function printNota() {
        window.print();
    }
</script>

<!-- CSS untuk Tampilan Cetak -->
<style>
    @media print {
        .btn {
            display: none; /* Sembunyikan tombol saat cetak */
        }
        .container {
            margin: 0;
            padding: 0;
        }
        /* Sesuaikan font atau elemen lain jika diperlukan */
        body {
            font-size: 12px;
        }
    }
</style>
