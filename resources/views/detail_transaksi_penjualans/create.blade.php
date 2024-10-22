<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Detail Transaksi Penjualan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, darkslateblue, salmon);
        }

        .card {
            background: linear-gradient(to right, rgba(231, 243, 254, 0.3), rgba(255, 255, 255, 0.3));
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        h4 {
            font-size: 24px;
            font-weight: bold;
            color: #ffffff;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #ffffff;
        }

        .form-control {
            border: 1px solid #ced4da;
            padding: 10px;
            font-size: 14px;
        }

        .btn-primary {
            background-color: #6A5ACD;
            border-color: #007bff;
            color: #FFFFFF;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
        }

        .btn-primary:hover {
            background-color: #4B0082;
            color: #FFFFFF;
            border: none;
        }

        .btn-warning {
            background-color: #FF7F50;
            border-color: #ffc107;
            color: #FFFFFF;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
        }

        .btn-warning:hover {
            background-color: #FF6347;
            color: #FFFFFF;
            border: none;
        }
    </style>
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <h4 class="title">Add New Detail Transaksi Penjualan</h4>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form id="transaksiForm" action="{{ route('detail_transaksi_penjualans.store') }}" method="POST">
                            @csrf

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Nama Kasir</label>
                                <input type="text" class="form-control @error('nama_kasir') is-invalid @enderror" name="nama_kasir" placeholder="Masukkan Nama Kasir" required>
                                @error('nama_kasir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Tanggal Transaksi</label>
                                <input type="date" class="form-control @error('tanggal_transaksi') is-invalid @enderror" name="tanggal_transaksi" required>
                                @error('tanggal_transaksi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Nama Produk</label>
                                <select class="form-control @error('product_id') is-invalid @enderror" name="product_id" id="productSelect" required onchange="updatePrice()">
                                    <option value="">Pilih Produk</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}" data-price="{{ $product->harga }}">{{ $product->title }}</option>
                                    @endforeach
                                </select>
                                @error('product_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Harga</label>
                                <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" id="harga" placeholder="Masukkan Harga" required readonly>
                                @error('harga')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Jumlah Pembelian</label>
                                <input type="number" class="form-control @error('jumlah_pembelian') is-invalid @enderror" name="jumlah_pembelian" placeholder="Masukkan Jumlah Pembelian" required>
                                @error('jumlah_pembelian')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary me-3">SAVE</button>
                            <button type="button" id="resetBtn" onclick="resetForm()" class="btn btn-md btn-warning">RESET</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function resetForm() {
            document.getElementById("transaksiForm").reset();
            document.getElementById("harga").value = ''; // Reset the price field
        }

        function updatePrice() {
            var productSelect = document.getElementById("productSelect");
            var selectedOption = productSelect.options[productSelect.selectedIndex];
            var hargaInput = document.getElementById("harga");

            // Get the price from the selected product's data attribute
            var harga = selectedOption.getAttribute("data-price");
            hargaInput.value = harga; // Update the price input field
        }

        document.addEventListener("DOMContentLoaded", function () {
            new TypeIt(".title", {
                strings: [],
                speed: 50
            }).go();
        });
    </script>
</body>
</html>
