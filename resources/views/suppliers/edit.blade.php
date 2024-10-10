<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray;">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <h4>Edit Supplier</h4>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Nama Supplier</label>
                                <input type="text" class="form-control @error('supplier_name') is-invalid @enderror" 
                                    name="supplier_name" 
                                    value="{{ old('supplier_name', $supplier->supplier_name) }}" 
                                    placeholder="Masukkan Nama Supplier">
                                @error('supplier_name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Alamat Supplier</label>
                                <input type="text" class="form-control @error('alamat_supplier') is-invalid @enderror" 
                                    name="alamat_supplier" 
                                    value="{{ old('alamat_supplier', $supplier->alamat_supplier) }}" 
                                    placeholder="Masukkan Alamat Supplier">
                                @error('alamat_supplier')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">P.I.C Name</label>
                                <input type="text" class="form-control @error('pic_supplier') is-invalid @enderror" 
                                    name="pic_supplier" 
                                    value="{{ old('pic_supplier', $supplier->pic_supplier) }}" 
                                    placeholder="Masukkan Nama P.I.C">
                                @error('pic_supplier')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Nomor HP P.I.C</label>
                                <input type="text" class="form-control @error('no_hp_pic_supplier') is-invalid @enderror" 
                                    name="no_hp_pic_supplier" 
                                    value="{{ old('no_hp_pic_supplier', $supplier->no_hp_pic_supplier) }}" 
                                    placeholder="Masukkan Nomor HP P.I.C">
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
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
