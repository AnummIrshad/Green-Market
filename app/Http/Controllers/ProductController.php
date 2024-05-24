<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Import the Product model at the top of your controller

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Retrieve all products from the database
        return view('products.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'vendor_name' => 'required|string|max:255',
            'item_category' => 'required|string|max:255',
            'stock_quantity' => 'required|integer',
            'product_image_url' => 'nullable|url',
        ]);

        $product = new Product();
        $product->product_name = $request->input('product_name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->vendor_name = $request->input('vendor_name');
        $product->item_category = $request->input('item_category');
        $product->stock_quantity = $request->input('stock_quantity');
        $product->product_image_url = $request->input('product_image_url');
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product added successfully');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'vendor_name' => 'required|string|max:255',
            'item_category' => 'required|string|max:255',
            'stock_quantity' => 'required|integer',
            'product_image_url' => 'nullable|url',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('status', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }

    public function showDetails(Product $product)
    {
        return view('details', compact('product'));
    }


   
}
