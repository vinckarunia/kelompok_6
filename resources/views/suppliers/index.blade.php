<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Supplier Data</title>
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

        h3 {
            font-size: 24px;
            font-weight: bold;
            color: #ffffff;
            margin-bottom: 20px;
            text-align: center;
        }

        table {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
        }

        th, td {
            color: #333;
            text-align: center;
        }

        th {
            background-color: #6A5ACD;
            color: white;
            font-weight: bold;
        }

        .btn-primary {
            background-color: #6A5ACD;
            border-color: #007bff;
            color: #FFFFFF;
            font-weight: bold;
            padding: 8px 12px;
            border: none;
        }

        .btn-primary:hover {
            background-color: #4B0082;
            color: #FFFFFF;
            border: none;
        }

        .btn-dark {
            background-color: #333;
            border-color: #333;
            color: #FFFFFF;
            padding: 8px 12px;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
            font-weight: bold;
        }

        .btn-danger {
            background-color: #FF6347;
            border-color: #FF6347;
            color: #FFFFFF;
        }

        .alert {
            background-color: rgba(255, 69, 0, 0.8);
            color: white;
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3>ANJAYANI SHOP SUPPLIER</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('suppliers.create') }}" class="btn btn-md btn-success mb-3">ADD DETAILS</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">NAMA SUPPLIER</th>
                                    <th scope="col">ALAMAT SUPPLIER</th>
                                    <th scope="col">P.I.C</th>
                                    <th scope="col">NO. HP P.I.C</th>
                                    <th scope="col" style="width: 30%">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($suppliers as $supplier)
                                <tr>
                                    <td>{{ $supplier->supplier_name }}</td>
                                    <td>{{ $supplier->alamat_supplier }}</td>
                                    <td>{{ $supplier->pic_supplier }}</td>
                                    <td>{{ $supplier->no_hp_pic_supplier }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?')" action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST">
                                            <a href="{{ route('suppliers.show', $supplier->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                            <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <div class="alert alert-danger">
                                    Data Suppliers belum Tersedia.
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $suppliers->links() }}
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
