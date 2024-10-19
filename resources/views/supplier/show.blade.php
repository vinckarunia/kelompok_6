<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    .bg {
        background: linear-gradient(to right, darkslateblue, salmon);
    }

    #card  {
    background-color: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    color: white;
    border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .btn {
        color: white;
        border: 2px solid white;
    }

    .btn:hover {
        color: black;
        background: white;
    }

</style>

<body class="bg">
    
    <div class="container mt-5 mb-5">
        <div class="row">
            <h3 id="type" style="color: white;">Supplier identity</h3>
            <hr>
            <div class="col-md-4">
                <div class="card border-0 shadow-5m rounded">
                   
                    <!-- <div class="card-body">
                        <img src="{{ asset('/storage/images/'.$supplier->image) }}" class="rounded" style="width: 100%"> -->
                         <!-- <img src="https://plus.unsplash.com/premium_photo-1682144187125-b55e638cf286?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTd8fHBvcnRyYWl0JTIwbWFufGVufDB8fDB8fHww" alt="photo.jpg" style="width: 100%">
                    </div> -->
                </div>
            </div>
            <div>
                <div class="card border-0 shadow-5m rounded" id="card">
                    <div class="card-body" >
                        <h3 class="nama">{{ $supplier->nama_supplier }}</h3>
                        <hr/>
                        <p class="alamat">Alamat Supplier: {{ $supplier->alamat_supplier }}</p>
                        <hr/>
                        <p class="pic">PIC Supplier: {{ $supplier->pic_supplier }}</p>
                        <hr/>
                        <p class="no_hp">No HP PIC: {{ $supplier->no_hp_pic_supplier }}</p>
                        <hr/>
                        <a href="{{ route('suppliers.index') }}" class="btn ">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/typeit@8.7.1/dist/index.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
          document.addEventListener("DOMContentLoaded", function () {
        new TypeIt("#type", {
        strings: [],
        speed: 50
        }).go();

        new TypeIt(".nama", {
        strings: [],
        speed: 50
        }).go();

        new TypeIt(".alamat", {
        strings: [],
        speed: 50
        }).go();

        new TypeIt(".pic", {
        strings: [],
        speed: 50
        }).go();

        new TypeIt(".no_hp", {
        strings: [],
        speed: 50
        }).go();

        
        
        });
    </script>
</body>
</html>
