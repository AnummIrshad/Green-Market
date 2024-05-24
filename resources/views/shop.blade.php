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
        <link rel="stylesheet" href="{{ asset('css/shop.css') }}">
      
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

            
            <li><a href="#">Vendors</a></li>
            <li><a href="#">Categories</a></li>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
            
       
    @endif
    

</ul>
</header>

 <!--navbar end-->

 <!--Home-->
 <section class="home" id="home">
 

  <div class="home-text">
        <span>Welcome to</span>
        <h1>JAGRO FARMS</h1>
        <h2>Fresh produce is just a <br> tap away</h2> <br>
        <a href="#" class="btn">Browse Vendors</a>
        <a href="#" class="btn">Home page</a>
        
    </div>
    <div class="home-img">
        <img src="{{ asset('images/vendorcover1.png') }}">

    </div>
</section>







 

<body>
    <div class="container">
    <div class="container">
    <div class="row align-items-center">
        <div class="col-12 col-md-4 d-flex justify-content-center">
            <a href="{{ route('cart.view') }}" class="btn btn-info">View Cart</a>
        </div>
        <div class="col-12 col-md-4 d-flex justify-content-center">
            <h1 class="decorated-heading">Shop Now</h1>
        </div>
        <div class="col-12 col-md-4">
            <!-- Search Bar -->
<div class="search-bar">
    <form action="#" method="GET">
        <input type="text" name="query" placeholder="Search for products...">
        <button type="submit">
            <i class="fas fa-search"></i> <!-- Font Awesome search icon -->
        </button>
    </form>
</div>
        </div>
    </div>
    
</div>


        <div class="row mt-4">

            @foreach ($vegetableProducts as $product)

                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('images/' . $product->product_image_url) }}" class="card-img-top"
                            alt="{{ $product->product_name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->product_name }}</h5>
                            <p class="card-text">Vendor: {{ $product->vendor_name }}</p>
                            <p class="card-text">Price: LKR {{ $product->price }}</p>
                            <p class="card-text">Quantity: {{ $product->stock_quantity }} Kg</p>
                            <div class="button-group">
    <a href="{{ route('products.details', $product) }}" class="btn btn-info btn-custom btn-details"> Details</a>
    <!-- Add to Cart Button -->
    <form action="{{ route('cart.add', $product) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-info1 btn-custom btn-add-to-cart">Add to Cart</button>
    </form>
</div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>



    <!--footer-->

    <footer>
        <div class="footer-content">
            <div class="footer-section about">
                <h2>About Us</h2>
                <p>Your e-commerce store description goes here.</p>
            </div>
            <div class="footer-section contact">
                <h2>Contact Us</h2>
                <p>Email: info@example.com</p>
                <p>Phone: +1 (123) 456-7890</p>
            </div>
            <div class="footer-section links">
                <h2>Quick Links</h2>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Shop</a></li>
                    <li><a href="#">Products</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="footer-section social">
                <h2>Follow Us</h2>
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; 2023 Your E-commerce Website | All rights reserved.
        </div>
    </footer>
</body>

</html>