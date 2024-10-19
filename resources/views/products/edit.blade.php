<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    .bg {
        background: linear-gradient(to right, darkslateblue, salmon);
    }

    .title{
        color: white;
    }

</style>
<body class="bg">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <h4 class="title">Edit Product</h4>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('products.update', $data['product']->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">IMAGE</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                                
                                <!-- error message untuk image -->
                                @error('image')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="product_category_id">Product Category</label>
                                <select class="form-control" name="product_category_id" id="product_category_id">
                                    <option value="">-- Select Category Product --</option>
                                    @foreach ($data['categories'] as $category)
                                        <option value="{{ $category->id }}"
                                        @if(old("product_category_name", $data['product']->product_category_id) == $category->id) selected @endif>
                                        {{ $category->product_category_name }}</option>
                                    @endforeach
                                </select>

                                @error('product_category_id')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="supplier_id">Supplier</label>
                                <select class="form-control" name="supplier_id" id="supplier_id">
                                    <option value="">-- Select Supplier --</option>
                                    @foreach ($data['suppliers'] as $supplier)
                                        <option value="{{ $supplier->id }}"
                                        @if(old("supplier_id", $data['product']->supplier_id) == $supplier->id) selected @endif>
                                        {{ $supplier->nama_supplier }}</option>
                                    @endforeach
                                </select>

                                @error('supplier_id')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">TITLE</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                value="{{ old('title', $data['product']->title) }}" placeholder="Masukan Judul Project">

                                @error('title')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">DESCRIPTION</label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                name="description" rows="5" placeholder="Masukan Description Product">
                                {{ old('description', $data['product']->description) }}</textarea>

                                @error('description')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">PRICE</label>
                                        <input type="number" class="form-control @error('price') is-invalid @enderror"
                                        name="price" value="{{ old('price', $data['product']->price) }}" placeholder="Masukan Harga Product">

                                        @error('price')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">STOCK</label>
                                        <input type="text" class="form-control @error('stock') is-invalid @enderror" name="stock"
                                        value="{{ old('stock', $data['product']->stock) }}" placeholder="Masukkan Stock Product">

                                        <!-- error message untuk stock -->
                                        @error('stock')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
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
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
         document.addEventListener("DOMContentLoaded", function () {
        new TypeIt(".title", {
        strings: [],
        speed: 50
        }).go();

       

      

        });
        CKEDITOR.replace('description');
    </script>
</body>
</html>
