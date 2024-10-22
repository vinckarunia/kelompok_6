<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Data Detail Transaksi Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">DETAIL TRANSAKSI PENJUALAN</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('detail_transaksi_penjualans.create') }}" class="btn btn-md btn-success mb-3">ADD DETAIL TRANSAKSI</a>
                        
                        @if($detailTransaksiPenjualans->isEmpty())
                            <div class="alert alert-danger">
                                Data Detail Transaksi belum Tersedia.
                            </div>
                        @endif

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">NAMA KASIR</th>
                                    <th scope="col">TANGGAL TRANSAKSI</th>
                                    <th scope="col">NAMA PRODUK</th>
                                    <th scope="col">HARGA</th>
                                    <th scope="col">JUMLAH PEMBELIAN</th>
                                    <th scope="col">TOTAL HARGA</th>
                                    <th scope="col" style="width: 20%">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($detailTransaksiPenjualans as $detail)
                                    <tr>
                                        <td>{{ $detail->nama_kasir }}</td>
                                        <td>{{ $detail->tanggal_transaksi ? $detail->tanggal_transaksi->format('d-m-Y') : 'N/A' }}</td>
                                        <td>{{ $detail->product->title }}</td>
                                        <td>{{ number_format($detail->product->price, 0, ',', '.') }}</td>
                                        <td>{{ $detail->jumlah_pembelian }}</td>
                                        <td>{{ number_format($detail->product->price * $detail->jumlah_pembelian, 0, ',', '.') }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?')" action="{{ route('detail_transaksi_penjualans.destroy', $detail->id) }}" method="POST">
                                                <a href="{{ route('detail_transaksi_penjualans.show', $detail->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                                <a href="{{ route('detail_transaksi_penjualans.edit', $detail->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <!-- This will not be reached as the alert is above -->
                                @endforelse
                            </tbody>
                        </table>
                        {{ $detailTransaksiPenjualans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // message with sweetalert
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
