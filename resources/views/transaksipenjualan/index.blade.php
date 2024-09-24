<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Transaction Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: rgb(0, 0, 0)">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">ANJAYANI SHOP TRANSACTION</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('transaksipenjualan.create') }}" class="btn btn-md btn-success mb-3">ADD TRANSACTION</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">ID PRODUK</th>
                                    <th scope="col">JUMLAH PEMBELIAN</th>
                                    <th scope="col">NAMA KASIR</th>
                                    <th scope="col">TANGGAL TRANSAKSI</th>
                                    <th scope="col" style="width: 20%">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->id_products }}</td>
                                    <td>{{ $transaction->jumlah_pembelian }}</td>
                                    <td>{{ $transaction->nama_kasir }}</td>
                                    <td>{{ $transaction->tanggal_transaksi }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?')" action="{{ route('transaksipenjualan.destroy', $transaction->id) }}" method="POST">
                                            <a href="{{ route('transaksipenjualan.show', $transaction->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                            <a href="{{ route('transaksipenjualan.edit', $transaction->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">
                                        <div class="alert alert-danger">
                                            Data Transaksi belum Tersedia.
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $transactions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Message with SweetAlert
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'BERHASIL',
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'GAGAL',
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>

</body>
</html>
