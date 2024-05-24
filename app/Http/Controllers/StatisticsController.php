<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\Models\OrderDetail;
use App\Models\User; // Import the User model
use App\Models\Order; // Import the User model
use App\Models\Product;

class StatisticsController extends Controller
{
    public function getStatistics()
    {
        $totalUsers = User::count();
        //$totalUsers: Uses the count method to get the total number of rows in the users table using the User model.
        
        $totalProducts = Product::count();

        $totalOrders = Order::count();
        $totalRevenue = OrderDetail::sum('total');
        //$totalRevenue: Uses the sum method to calculate the sum of the 'total_amount' column in the orders table using the Order model.
        $totalCost = OrderDetail::sum('product_unit_price');


        $totalOrderItems = OrderDetail::count();
        $averageOrderValue = $totalOrderItems > 0 ? $totalRevenue / $totalOrderItems : 0;


        return view('statistics', compact('totalUsers', 'totalOrders', 'totalRevenue', 'totalProducts', 'totalCost', 'averageOrderValue' ));
    }
}
