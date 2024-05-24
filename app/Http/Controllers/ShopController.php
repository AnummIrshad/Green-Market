<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ShopController extends Controller
{
    /**
     * Display all vegetables in the shop.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $vegetableProducts = Product::where('item_category', 'Vegetable')->get();
        
        return view('shop', compact('vegetableProducts'));
    }
}
