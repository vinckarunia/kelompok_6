<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">
    
    <div class="container mt-5 mb-5">
        <div class="row">
            <h3>Show Supplier</h3>
            <hr>
            <div class="col-md-4">
                <div class="card border-0 shadow-5m rounded">
                   
                    <div class="card-body">
                        <!-- <img src="{{ asset('/storage/images/'.$supplier->image) }}" class="rounded" style="width: 100%"> -->
                         <img src="https://plus.unsplash.com/premium_photo-1682144187125-b55e638cf286?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTd8fHBvcnRyYWl0JTIwbWFufGVufDB8fDB8fHww" alt="photo.jpg" style="width: 100%">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card border-0 shadow-5m rounded">
                    <div class="card-body">
                        <h3>{{ $supplier->nama_supplier }}</h3>
                        <hr/>
                        <p>Alamat Supplier: {{ $supplier->alamat_supplier }}</p>
                        <hr/>
                        <p>PIC Supplier: {{ $supplier->pic_supplier }}</p>
                        <hr/>
                        <p>No HP PIC: {{ $supplier->no_hp_pic_supplier }}</p>
                        <hr/>
                        <a href="{{ route('suppliers.index') }}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
