@extends('layouts.app')

@section('content')
  
        <div class="product-management-form ">
            <h1 class="mb-4">Update Product</h1>

            <form action="{{ route('products.update', $product) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="product_name" class="col-sm-2 col-form-label text-right">Product Name:</label>
                    <div class="col-sm-10">
                        <input type="text" name="product_name" id="product_name" class="form-control custom-input" value="{{ $product->product_name }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label text-right">Description:</label>
                    <div class="col-sm-10">
                        <textarea name="description" id="description" class="form-control custom-input" required>{{ $product->description }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="price" class="col-sm-2 col-form-label text-right">Price:</label>
                    <div class="col-sm-10">
                        <input type="number" name="price" id="price" class="form-control custom-input" value="{{ $product->price }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="vendor_name" class="col-sm-2 col-form-label text-right">Vendor Name:</label>
                    <div class="col-sm-10">
                        <input type="text" name="vendor_name" id="vendor_name" class="form-control custom-input" value="{{ $product->vendor_name }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="item_category" class="col-sm-2 col-form-label text-right">Item Category:</label>
                    <div class="col-sm-10">
                        <input type="text" name="item_category" id="item_category" class="form-control custom-input" value="{{ $product->item_category }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="stock_quantity" class="col-sm-2 col-form-label text-right">Stock Quantity:</label>
                    <div class="col-sm-10">
                        <input type="number" name="stock_quantity" id="stock_quantity" class="form-control custom-input" value="{{ $product->stock_quantity }}" required>
                    </div>
                </div>

              

                <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('products.index') }}" class="btn btn-primary mt-3">Back to Product List</a>
                    </div>
                </div>
            </form>
        </div>

    <link href="{{ asset('css/user-management.css') }}" rel="stylesheet">
@endsection
