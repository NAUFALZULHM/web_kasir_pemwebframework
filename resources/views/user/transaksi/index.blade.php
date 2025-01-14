<div class="row p-2">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5><b>{{ $title }}</b></h5>

                <!-- Tombol Tambah dan Hapus Semua -->
                <div class="d-flex justify-content-between mb-2">
                    <a href="{{ route('transaksi.create') }}" class="btn btn-primary align-self-center">
                        <i class="fa fa-plus"></i> Tambah
                    </a>

                    <form action="{{ route('transaksi.hapus-semua') }}" method="POST" id="hapusSemuaForm">
                        @csrf
                        @method('delete')
                        <button type="button" class="btn btn-danger align-self-center" id="hapusSemuaButton">
                            Hapus Semua Transaksi
                        </button>
                    </form>
                </div>

                <!-- Tabel Transaksi -->
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($transaksi as $k => $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <div class="d-flex">
                                @if ($item->status !== 'selesai')
                                    <a href="/transaksi/{{ $item->id }}/edit" class="btn btn-info btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                @else
                                    <a href="/transaksi/{{ $item->id }}/nota" class="btn btn-secondary btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                @endif

                                <form action="/transaksi/{{ $item->id }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm ml-1" {{ $item->status === 'selesai' ? : '' }}>
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>

                <!-- Pagination -->
                <div class="d-flex justify-content-center">
                    {{ $transaksi->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script untuk Konfirmasi -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('hapusSemuaButton').addEventListener('click', function () {
        Swal.fire({
            title: 'Yakin ingin menghapus semua transaksi?',
            text: "Tindakan ini tidak dapat dibatalkan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('hapusSemuaForm').submit();
            }
        });
    });
</script>
