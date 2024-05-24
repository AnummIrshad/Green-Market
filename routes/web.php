<?php

use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ViewDetailsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\StatisticsController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/





Route::middleware(['auth'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');

    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');

    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});






Route::middleware(['auth'])->group(function () {
    // List all products
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');

    // Create a new product
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');

    // Edit a product
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');

    // Show a specific product
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

    // Delete a product
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});



//route to shop
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
// route to show product details
Route::get('/product/{product}', [ProductController::class, 'showDetails'])->name('product.details');


//route to individual product details page
Route::get('/details/{product}', [ProductController::class, 'showDetails'])->name('products.details');


//route to categories page
Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');

//route to view details page
Route::get('/viewdetails', [ViewDetailsController::class, 'index'])->name('viewdetails.index');




Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// Add to Cart
Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');

// View Cart
Route::get('/cart/view', [CartController::class, 'viewCart'])->name('cart.view');

// Increment and Decrement Quantity
Route::post('/cart/increment/{product}', [CartController::class, 'incrementQuantity'])->name('cart.increment');
Route::post('/cart/decrement/{product}', [CartController::class, 'decrementQuantity'])->name('cart.decrement');

// Remove from Cart
Route::delete('/cart/remove/{product}', [CartController::class, 'removeFromCart'])->name('cart.remove');

//checkout
Route::get('/checkout', [CheckoutController::class, 'view'])->name('checkout.view');
Route::post('/checkout', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');



//statistics
Route::get('/statistics', 'StatisticsController@getStatistics')->name('statistics');
Route::get('/statistics', [StatisticsController::class, 'getStatistics'])->name('statistics');

//analytics
Route::get('/analytics', [AnalyticsController::class, 'getAnalytics'])->name('analytics');


require __DIR__.'/auth.php';
