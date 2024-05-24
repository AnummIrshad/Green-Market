@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Product Details</h1>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12" style="font-size: 20px;">
                        <strong>Product Name:</strong> {{ $product->product_name }}
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-12" style="font-size: 20px;">
                        <strong>Description:</strong> {{ $product->description }}
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-12" style="font-size: 20px;">
                        <strong>Price:</strong> ${{ number_format($product->price, 2) }}
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-12" style="font-size: 20px;">
                        <strong>Vendor Name:</strong> {{ $product->vendor_name }}
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-12" style="font-size: 20px;">
                        <strong>Item Category:</strong> {{ $product->item_category }}
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-12" style="font-size: 20px;">
                        <strong>Stock Quantity:</strong> {{ $product->stock_quantity }}
                    </div>
                </div>

                
            </div>
        </div>

        <div class="mt-12">
            <a href="{{ route('products.index') }}" class="btn btn-primary" style="font-size: 20px;">Back to Product List</a>
        </div>
    </div>
    <link href="{{ asset('css/user-management.css') }}" rel="stylesheet">

@endsection
