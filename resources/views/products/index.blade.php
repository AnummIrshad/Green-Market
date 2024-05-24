@extends('layouts.app')

@section('content')
    <div class="container bg-white">
        <h1 class="decorated-heading">Product Management</h1>

        <a href="{{ route('products.create') }}" class="btn btn-primary ml-6 decorated-button">Add New Product</a>
        <br>

        <div class="overflow-x-auto">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Vendor Name</th>
                        <th>Item Category</th>
                        <th>Stock Quantity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->vendor_name }}</td>
                            <td>{{ $product->item_category }}</td>
                            <td>{{ $product->stock_quantity }}</td>
                            <td>
    <a href="{{ route('products.show', $product) }}" class="btn btn-info mr-2">View</a>
</td>
<td>
    <a href="{{ route('products.edit', $product) }}" class="btn btn-warning mr-2">Update</a>
</td>
<td>
    <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger mr-2">Delete</button>
    </form>
</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <link href="{{ asset('css/user-management.css') }}" rel="stylesheet">
@endsection
