<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Suppliers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    .bg{
        background: linear-gradient(to right, darkslateblue, salmon)
    }

    .title {
        color: white;
    }
</style>
<body class="bg">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <h4 class="title">Edit Suppliers</h4>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST"  enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Nama Supplier</label>
                                <input type="text" class="form-control @error('nama_supplier') is-invalid @enderror" name="nama_supplier"
                                value="{{ old('nama_supplier', $supplier->nama_supplier) }}" placeholder="Masukkan Nama Supplier">

                                @error('nama_supplier')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Alamat Supplier</label>
                                <textarea class="form-control @error('alamat_supplier') is-invalid @enderror"
                                        name="alamat_supplier" rows="3" placeholder="Masukkan Alamat Supplier">{{ old('alamat_supplier', $supplier->alamat_supplier) }}</textarea>

                                @error('alamat_supplier')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="form-group mb-3">
                                <label class="font-weight-bold">No HP PIC Supplier</label>
                                <input type="text" class="form-control @error('no_hp_pic_supplier') is-invalid @enderror"
                                name="no_hp_pic_supplier" value="{{ old('no_hp_pic_supplier', $supplier->no_hp_pic_supplier) }}" placeholder="Masukkan No HP PIC Supplier">

                                @error('no_hp_pic_supplier')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary me-3">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/typeit@8.7.1/dist/index.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
        new TypeIt(".title", {
        strings: [],
        speed: 50
        }).go();

       

      

        });
    </script>
</body>
</html>
