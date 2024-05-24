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
    <link rel="stylesheet" href="{{ asset('css/shop.css') }}">
    <style>
        body {
    font-family: 'Arial', sans-serif;
    background-image: url('/images/background.png');  /* Replace 'path/to/your/background-image.jpg' with the actual path to your image */
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    margin: 0;
    padding: 0;
}

        .container {
            width: 80%;
            margin: 0 auto;
        }

        h1.decorated-heading {
            background-color: #45a049;
            color: #ffffff;
            padding: 10px;
            margin-bottom: 0px;
            text-align: center;
        }

        .checkout-container {
            display: flex;
            justify-content: space-between;
            background-color: #ffffff;
        }

        .checkout-summary {
            width: 48%;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .checkout-form {
            width: 48%;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .cart-totals {
            margin-bottom: 20px;
        }

        form {
            max-width: 400px;
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #ffffff;
            cursor: pointer;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
        }

  
.btn-back {
    background-color: #28a745; /* Green color */
    color: #fff; /* White text color */
    text-align: center; /* Center align text */
    display: block; /* Make the button a block element */
    width: 100%; /* Make the button full width */
    padding: 10px; /* Add padding */
    border: none; /* Remove border */
    border-radius: 5px; /* Add border radius */
    text-decoration: none; /* Remove default link underline */
    cursor: pointer; /* Change cursor to pointer on hover */
}

.btn-submit:hover,
.btn-back:hover {
    background-color: #218838; /* Darker green color on hover */
}


        .btn:hover {
            background-color: #0056b3;
        }

        .cart-totals {
    margin-bottom: 20px;
    padding: 20px;
    background-color: #f8f9fa;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.cart-totals h2 {
    font-size: 24px;
    margin-bottom: 15px;
}

.summary-item {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
}

.label {
    font-weight: bold;
}

.total .value {
    font-weight: bold;
    color: black;
}




    </style>
</head>

<body>
    <div class="container">
        <h1 class="decorated-heading">Checkout</h1>

        @if (!empty($cartItems) && count($cartItems) > 0)
            <div class="checkout-container">
                <div class="checkout-summary">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartItems as $item)
                                <tr>
                                  
                                    <td>{{ $item->product_name }}</td>
                                    <td>LKR {{ $item->price }}</td>
                                    <td>{{ $item->stock_quantity }} Kg</td>
                                    <td>LKR {{ $item->price * $item->quantity }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>




                    <div class="cart-totals">
    <h2>Cart Summary</h2>
    <div class="summary-item">
        <span class="label">Subtotal</span>
        <span class="value">LKR {{ $subtotal }}</span>
    </div>
    <div class="summary-item">
        <span class="label">Shipping Cost</span>
        <span class="value">LKR {{ $shippingCost }}</span>
    </div>
    <div class="summary-item">
        <span class="label">Taxes</span>
        <span class="value">LKR {{ $taxes }}</span>
    </div>
    <div class="summary-item">
        <span class="label">Discount Coupon</span>
        <span class="value">LKR {{ $discountCoupon }}</span>
    </div>
    <div class="summary-item total">
        <span class="label">Final Total</span>
        <span class="value">LKR {{ $finalTotal }}</span>
    </div>
   
</div>




                    <img src="/images/coverimage.png" alt="Cart Totals Image" style="max-width: 80%; height: auto;">

                </div>

                <div class="checkout-form">
                    <form action="{{ route('checkout.placeOrder') }}" method="POST">
                        @csrf
                        <label for="firstName">First Name:</label>
                        <input type="text" id="firstName" name="firstName" required>
                        
                        <label for="lastName">Last Name:</label>
                        <input type="text" id="lastName" name="lastName" required>
                        
                        <label for="contact">Contact:</label>
                        <input type="text" id="contact" name="contact" required>
                        
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                        
                        <label for="address">Address:</label>
                        <input type="text" id="address" name="address" required>
                        
                        <label for="city">City:</label>
                        <input type="text" id="city" name="city" required>
                        
                        <label for="postalCode">Postal Code:</label>
                        <input type="text" id="postalCode" name="postalCode" required>
                        
                        <a  value="Place Order" class="btn btn-back">Place Order</a>

                        <a href="{{ route('shop') }}" class="btn btn-back">Back to Shop</a>

                    </form>
                </div>
            </div>

        @else
            <p>Your cart is empty.</p>
        @endif
    </div>
</body>

</html>
