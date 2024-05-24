<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;


class CheckoutController extends Controller
{ 
    public function view(Request $request)
    {
        // Retrieve the current cart from the session
        $cart = $request->session()->get('cart', []);

        // Convert the cart array into a collection
        $cartCollection = collect($cart);

        // Get the cart items from the database
        $cartItems = Product::whereIn('id', $cartCollection->pluck('productId'))->get();

        // Additional modification to include product images
        $cartItems = $cartItems->map(function ($item) use ($cartCollection) {
            $item->quantityInCart = $cartCollection->where('productId', $item->id)->first()['quantity'];
            return $item;

        });

        // Calculate the subtotal
        $subtotal = $cartCollection->sum(function ($item) {
            $product = Product::find($item['productId']);
            return $product->price * $item['quantity'];
        });

        // Calculate the shipping cost, taxes, discount, and final total as needed
        $shippingCost = 10;
        $taxes = $subtotal * 0.15;
        $discountCoupon = 0;
        $finalTotal = $subtotal + $shippingCost + $taxes - $discountCoupon;

        return view('checkout', compact('cartItems', 'subtotal', 'shippingCost', 'taxes', 'discountCoupon', 'finalTotal'));
    } 




    public function placeOrder(Request $request)
    {
        // Validate the form data
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'contact' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'city' => 'required',
            'postalCode' => 'required',
        ]);

        // Retrieve the current cart from the session
        $cart = $request->session()->get('cart', []);

        // Convert the cart array into a collection
        $cartCollection = collect($cart);

        // Create a new order
        $order = Order::create([
            'user_id' => auth()->user()->id, // Assuming you are using authentication
            'firstname' => $request->input('firstName'),
            'lastname' => $request->input('lastName'),
            'email' => $request->input('email'),
            'address_1' => $request->input('address'),
            'city' => $request->input('city'),
            'postal_code' => $request->input('postalCode'),
            'contact' => $request->input('contact'),
            // Add any other fields as needed
        ]);

        // Save order details for each item in the cart
        foreach ($cartCollection as $item) {
            $product = Product::find($item['productId']);


            if (!$product || !isset($product->name)) {
                throw new \Exception("Product not found or name is missing for product ID: {$item['productId']}");

            }



        

            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'product_name' => $product->name,
                'product_description' => $product->description,
                'product_vendor_name' => $product->vendor_name,
                'product_image_url' => $product->image_url,
                'quantity' => $item['quantity'],
                'product_unit_price' => $product->price,
                'total' => $product->price * $item['quantity'],
                // Add any other fields as needed
            ]);


        }

        // Clear the cart after the order is placed
        $request->session()->forget('cart');

        // Redirect to home or order confirmation page
        return redirect()->route('home')->with('success', 'Order placed successfully!');
    }
}
    

