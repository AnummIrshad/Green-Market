
<!-- resources/views/shop.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<header> 

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Welcome to the store</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">



         <!-- Link to your CSS file using the asset helper -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/details.css') }}">

    </head>
    
           
                 <!--navbar-->
   
       <a href="a" class="logo"><img src="{{ asset('images/logo.png') }}"></a>
        
        <ul class="navbar">
    
    @if (Route::has('login'))
        @auth
            @else
            <li>  <a href="{{ route('login') }}">Log in</a></li>

                @if (Route::has('register'))
                <li>     <a href="{{ route('register') }}">Register</a></li>
                @endif
            @endauth

            <li><a href="{{ route('users.index') }}">User Management</a></li>
            <li><a href="{{ route('products.index') }}">Product Management</a></li>

         
            <li><a href="#">Shop</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
       
    @endif
    

</ul>
<title>{{ $product->product_name }} Details</title>

</header>

 <!--navbar end-->

 <section class="details-bg" id="details-bg">































<body>
    <div class="container">

        <div class="product-details">
            <div class="product-image">
                <img src="{{ asset('images/' . $product->product_image_url) }}" alt="{{ $product->product_name }}">
            </div>
            <div class="product-info">
                <h2 class="card-title">{{ $product->product_name }}</h2>
                <p class="card-text">Vendor: {{ $product->vendor_name }}</p>
                <p class="card-text">Price: LKR {{ $product->price }}</p>
                <p class="card-text">Stock Quantity: {{ $product->stock_quantity }} Kg</p>

               <!-- Add to Cart Button -->
               <form action="{{ route('cart.add', $product) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">Add to Cart</button>
                </form>

                <!-- View Cart Button -->

                <a href="{{ route('shop') }}" class="btn btn-info" style="margin-top: 10px;">Continue shopping</a>
            </div>
        </div>
    </div>

    <!-- Include any additional JavaScript or scripts here -->
</body>

 </section>

</html>