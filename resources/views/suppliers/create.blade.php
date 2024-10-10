<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Add New Suppliers</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: rgb(0, 0, 0)">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-white">Add Supplier</h3>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form id="supplierForm" action="{{ route('suppliers.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-3">
                                <label class="font-weight-bold text-black">Nama Supplier</label>
                                <input type="text" class="form-control @error('supplier_name') is-invalid @enderror" name="supplier_name" placeholder="Masukkan Nama Supplier">
                                @error('supplier_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold text-black">Alamat Supplier</label>
                                <input type="text" class="form-control @error('alamat_supplier') is-invalid @enderror" name="alamat_supplier" placeholder="Masukkan Alamat Supplier">
                                @error('alamat_supplier')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold text-black">P.I.C Name</label>
                                <input type="text" class="form-control @error('pic_supplier') is-invalid @enderror" name="pic_supplier" placeholder="Masukkan Nama Supplier">
                                @error('pic_supplier')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold text-black">Nomor HP P.I.C</label>
                                <input type="text" class="form-control @error('no_hp_pic_supplier') is-invalid @enderror" name="no_hp_pic_supplier" placeholder="Masukkan Nomor HP">
                                @error('no_hp_pic_supplier')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Add Details</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('desc'); // Update to match the correct name for CKEditor

        function resetForm() {
            document.getElementById('supplierForm').reset(); // Reset sent data from form

            // Reset CKEditor content to empty
            for (var instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].setData(''); // Reset CKEditor content
            }
        }
    </script>
</body>
</html>
