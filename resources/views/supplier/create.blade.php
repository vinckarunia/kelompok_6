<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Supplier</title>
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
            <h4 class="title">Add New Supplier</h4>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form id="supplierForm" action="{{ route('suppliers.store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Nama Supplier</label>
                            <input type="text" class="form-control @error('nama_supplier') is-invalid @enderror" name="supplier_name" placeholder="Masukkan Nama Supplier">
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold">Alamat Supplier</label>
                            <textarea class="form-control @error('alamat_supplier') is-invalid @enderror" name="alamat_supplier" rows="3" placeholder="Masukkan Alamat Supplier"></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold">PIC Supplier</label>
                            <input type="text" class="form-control @error('pic_supplier') is-invalid @enderror" name="pic_supplier" placeholder="Masukkan PIC Supplier">
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold">No. HP PIC Supplier</label>
                            <input type="text" class="form-control @error('no_hp_pic_supplier') is-invalid @enderror" name="no_hp_pic_supplier" placeholder="Masukkan No. HP PIC Supplier">
                        </div>

                        <button type="submit" class="btn btn-md btn-primary me-3">SAVE</button>
                        <button type="button" id="resetBtn" onclick="resetForm()" class="btn btn-md btn-warning">RESET</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function resetForm() {
            document.getElementById("supplierForm").reset();
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