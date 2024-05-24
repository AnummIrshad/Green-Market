@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="product-management-form">
            <h1 class="mb-4">Add Product</h1>

            <form method="POST" action="{{ route('products.store') }}">
                @csrf

                <div class="form-group row">
                    <label for="product_name" class="col-sm-2 col-form-label text-right">Product Name:</label>
                    <div class="col-sm-10">
                        <input type="text" name="product_name" id="product_name" class="form-control custom-input" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label text-right">Description:</label>
                    <div class="col-sm-10">
                        <textarea name="description" id="description" class="form-control custom-input" required></textarea>
                    </div>
                </div>

                <div class="form-group row">
    <label for="price" class="col-sm-2 col-form-label text-right">Price per unit (LKR):</label>
    <div class="col-sm-10">
        <input type="number" step="0.01" name="price" id="price" class="form-control custom-input" required>
    </div>
</div>

                <div class="form-group row">
                    <label for="vendor_name" class="col-sm-2 col-form-label text-right">Vendor Name:</label>
                    <div class="col-sm-10">
                        <input type="text" name="vendor_name" id="vendor_name" class="form-control custom-input" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="item_category" class="col-sm-2 col-form-label text-right">Item Category:</label>
                    <div class="col-sm-10">
                        <input type="text" name="item_category" id="item_category" class="form-control custom-input" required>
                    </div>
                </div>

                <div class="form-group row">
    <label for="stock_unit" class="col-sm-2 col-form-label text-right">Stock Unit:</label>
    <div class="col-sm-3">
        <select name="stock_unit" id="stock_unit" class="form-control custom-input" required>
            <option value="kg">Kg</option>
            <option value="grams">Grams</option>
            <option value="liters">Liters</option>
            <!-- Add other units as needed -->
        </select>
    </div>
    <label for="stock_quantity" class="col-sm-2 col-form-label text-right">Quantity:</label>
    <div class="col-sm-3">
        <input type="number" name="stock_quantity" id="stock_quantity" class="form-control custom-input" step="0.01" required>
    </div>
</div>




              

                <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Add Product</button>
                        <a href="{{ route('products.index') }}" class="btn btn-primary mt-3">Back to Product List</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <link href="{{ asset('css/user-management.css') }}" rel="stylesheet">
@endsection
