<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function addToCart(Request $request, Product $product)
    {
        // Validate the quantity (assuming it's a positive integer)
        $request->validate([
            'quantity' => 'integer|min:1',
        ]);

        $quantity = $request->input('quantity', 1);

        // Check if the product exists
        if (!$product) {
            return redirect()->route('shop')->with('error', 'Product not found.');
        }

        // Check if cart exists in the session
        if ($request->session()->exists('cart')) {
            // Get the current cart
            $cart = $request->session()->get('cart');
            // Add the product object and quantity to the cart
            $cart[] = ['productId' => $product->id, 'quantity' => $quantity];
            // Store the updated cart back in the session
            $request->session()->put('cart', $cart);
        } else {
            // If cart doesn't exist, create a new one with the product object and quantity
            $request->session()->put('cart', [['productId' => $product->id, 'quantity' => $quantity]]);
        }

        return redirect()->route('cart.view')->with('success', 'Product added to cart');
    }

    public function viewCart(Request $request)
    {
        // Retrieve the current cart from the session
        $cart = $request->session()->get('cart', []);

        // Convert the cart array into a collection
        $cartCollection = collect($cart);

        // Get the cart items from the database
        $cartItems = Product::whereIn('id', $cartCollection->pluck('productId'))->get();

        // Calculate the subtotal
        $subtotal = $cartCollection->sum(function ($item) {
            $product = Product::find($item['productId']);
            return $product->price * $item['quantity'];
        });

        // Calculate the shipping cost
        $shippingCost = 10; // Replace this with your actual shipping cost calculation

        // Calculate the taxes
        $taxes = $subtotal * 0.15; // Replace this with your actual tax rate

        // Calculate the discount coupon
        $discountCoupon = 0; // Replace this with your actual discount coupon calculation

        // Calculate the final total
        $finalTotal = $subtotal + $shippingCost + $taxes - $discountCoupon;

        return view('cart', compact('cartItems', 'subtotal', 'shippingCost', 'taxes', 'discountCoupon', 'finalTotal'));
    }

    public function incrementQuantity(Request $request, $productId)
    {
        // Retrieve the current cart from the session
        $cart = $request->session()->get('cart', []);

        // Find the item in the cart and increment its quantity
        foreach ($cart as &$item) {
            if ($item['productId'] == $productId) {
                $item['quantity']++;
                break;
            }
        }

        // Store the updated cart back in the session
        $request->session()->put('cart', $cart);

        return redirect()->back();
    }

    public function decrementQuantity(Request $request, $productId)
    {
        // Retrieve the current cart from the session
        $cart = $request->session()->get('cart', []);

        // Find the item in the cart and decrement its quantity
        foreach ($cart as &$item) {
            if ($item['productId'] == $productId && $item['quantity'] > 1) {
                $item['quantity']--;
                break;
            }
        }

        // Store the updated cart back in the session
        $request->session()->put('cart', $cart);

        return redirect()->back();
    }

    public function removeFromCart(Request $request, $cartItemId)
{
    // Retrieve the current cart from the session
    $cart = $request->session()->get('cart', []);

    // Remove the item from the cart
    foreach ($cart as $key => $item) {
        if ($item['id'] == $cartItemId) {
            unset($cart[$key]);
            break;
        }
    }

    // Store the updated cart back in the session
    $request->session()->put('cart', array_values($cart));

    return redirect()->back();
}

}
