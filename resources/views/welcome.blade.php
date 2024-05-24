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

            <li><a href="#">Home</a></li>

         
            <li><a href="#">Shop</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Profile</a></li>

       
    @endif
    

</ul>
</header>
 <!--navbar end-->
 
 <!--Home-->
 <section class="home" id="home">
 

  <div class="home-text">
        <span>Welcome to</span>
        <h1>Green Market</h1>
        <h2>Fresh produce is just a <br> tap away</h2> <br>
        <a href="#" class="btn">Browse categories</a>
        <a href="#" class="btn">Browse vendors</a>
        
    </div>
    <div class="home-img">
        <img src="{{ asset('images/coverimage.png') }}">

    </div>
</section>

<!--new section-->

<section class="shop" id="shop">
    <div class="heading">
        <span>Shop Now</span>
        <h1>Shop category</h1>

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

</div>
</section>
<!--new delivery section-->


<section class="shop" id="shop">
    <div class="heading">
        <span>Shop Now</span>
        <h1>Shop vendor</h1>

</div>
<div class="shop-container">
    <div class="box">
        <div class="box-img">
        <img src="{{ asset('images/vendor1.jpg') }}">
        <h2>Jagro Farms</h2><br><br>
        <a href="{{ route('categories') }}" class="btn">Shop now</a>
       
        </div>
    </div>

    <div class="box">
        <div class="box-img">
        <img src="{{ asset('images/vendor2.jpg') }}">
        <h2>SunValley Farms</h2><br><br>
        <a href="{{ route('shop') }}" class="btn">Shop now</a>
       
        </div>
    </div>

    <div class="box">
        <div class="box-img">
        <img src="{{ asset('images/vendor3.jpg') }}">
        <h2>Agro Farms</h2><br><br>
        <a href="#" class="btn">Shop now</a>
       
        </div>
    </div>

    <div class="box">
        <div class="box-img">
        <img src="{{ asset('images/vendor4.png') }}">
        <h2>Better Basket</h2><br><br>
        <a href="#" class="btn">Shop now</a>
       
        </div>
    </div>

   

</div>
</section>
<!--new delivery section-->



<section class="delivery-pickup" id="delivery-pickup">
  

    
<div class="section-heading">
    <h2>WHY CHOOSE US</h2>
</div>
<div class="delivery-pickup-container">
    <div class="details-container">
        <h3>Same Day Delivery</h3>
        <img class="details-img" src="{{ asset('images/bike.png') }}" alt="Same Day Delivery">
        <p>Experience the ultimate convenience with our same day delivery service. When you choose us, you don't have to wait to savor the freshness of organic produce. Our dedicated team ensures that your orders are prepared and dispatched promptly, guaranteeing that you receive your items on the very day you place your order. We take pride in our commitment to providing you with the freshest produce available, straight from our trusted farmers to your table.</p>
    </div>
    <div class="details-container">
        <h3>Multiple Pick-Up Locations</h3>
        <img class="details-img" src="{{ asset('images/shop.png') }}" alt="Multiple Pick-Up Locations">
        <p>We understand that convenience is key for our customers. That's why we offer multiple pick-up locations across the region. Whether you're picking up groceries on your way home from work or planning a weekend shopping trip, our various pick-up points make it easy for you to collect your organic produce. Simply choose the location that suits you best, and our friendly staff will ensure a smooth and hassle-free pick-up experience.</p>
    </div>
    <div class="details-container">
        <h3>Nominal Prices</h3>
        <img class="details-img" src="{{ asset('images/price.png') }}" alt="Nominal Prices">
        <p>We believe that everyone should have access to high-quality, organic produce without breaking the bank. Our commitment to affordability means that you can enjoy the many health benefits of organic food without sacrificing your budget. We work closely with our partner farmers to keep prices nominal, ensuring that you can make healthy choices for you and your family. At our platform, quality meets affordability, making it easier than ever to prioritize your well-being.</p>
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
