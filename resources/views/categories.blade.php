<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Welcome to the store</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">



         <!-- Link to your CSS file using the asset helper -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
      
    </head>
    <body>
    
           
                 <!--navbar-->
<header> 
   
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
        <img src="{{ asset('images/coverimage.png') }}">

    </div>
</section>
 
 

<!--new section-->


<section class="shop" id="shop">
    <div class="heading">
        <span>Shop Now</span>
        <h1>Pick category</h1>

</div>

<div class="shop-container">
    
    <div class="box">
        <div class="box-img">
        <img src="{{ asset('images/1.png') }}">
        <h2>Vegetables</h2><br><br>
        <a href="{{ route('shop') }}" class="btn">Shop now</a>
       
        </div>
    </div>

    <div class="box">
        <div class="box-img">
        <img src="{{ asset('images/2.png') }}">
        <h2>Fruitss</h2><br><br>
        <a href="#" class="btn">Shop now</a>
       
        </div>
    </div>

    <div class="box">
        <div class="box-img">
        <img src="{{ asset('images/4.png') }}">
        <h2>Organic</h2><br><br>
        <a href="#" class="btn">Shop now</a>
       
        </div>
    </div>

    <div class="box">
        <div class="box-img">
        <img src="{{ asset('images/1.png') }}">
        <h2>All produce</h2><br><br>
        <a href="{{ route('shop') }}" class="btn">Shop now</a>
       
        </div>
    </div>

</div>
</section>











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




    </body>



          
                
           
</html>
