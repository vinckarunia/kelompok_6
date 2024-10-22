<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Show Transaksi Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <h3>Show Transaksi Penjualan</h3>
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3>Kasir: {{ $transaksiPenjualan->nama_kasir }}</h3>
                        <hr/>
                        <p>Tanggal Transaksi: {{ \Carbon\Carbon::parse($transaksiPenjualan->tanggal_transaksi)->format('d-m-Y') }}</p>
                        <hr/>
                        <p>ID Transaksi: {{ $transaksiPenjualan->id }}</p>
                        <hr/>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
