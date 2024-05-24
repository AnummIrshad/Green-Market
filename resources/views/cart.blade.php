<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    <title>Shopping Cart</title>
</head>
<body>
    <div class="container">
        <h1 class="decorated-heading">My Cart</h1>
        <div class="cart-wrapper">
            <div class="cart-items">
                @if (count($cartItems) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartItems as $item)
                                <tr>
                                    <td><img src="{{ asset($item->product_image_url) }}" alt="{{ $item->product_name }}" style="max-width: 50px;"></td>
                                    <td>{{ $item->product_name }}</td>
                                    <td>LKR {{ $item->price }}</td>
                                    <td>{{ $item->stock_quantity }} Kg</td>
                                    <td>LKR {{ $item->price * $item->quantity }}</td>



                                    <!-- Within the foreach loop -->
<td>
    <div class="action-buttons">
        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Remove</button>
        </form>
        <div class="quantity-box">
            <form action="{{ route('cart.increment', $item->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">+</button>
            </form>
            <span class="quantity">{{ $item->quantity }}</span>
            <form action="{{ route('cart.decrement', $item->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">-</button>
            </form>
        </div>
    </div>
</td>


                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Your cart is empty.</p>
                @endif
            </div>



            <div class="cart-totals">
            <h2 class="cart-summary-heading">Cart Summary</h2>
    <div class="totals-row">
        <span class="label">Subtotal:</span>
        <span class="value">LKR {{ $subtotal }}</span>
    </div>
    <div class="totals-row">
        <span class="label">Shipping Cost:</span>
        <span class="value">LKR {{ $shippingCost }}</span>
    </div>
    <div class="totals-row">
        <span class="label">Taxes:</span>
        <span class="value">LKR {{ $taxes }}</span>
    </div>
    <div class="totals-row">
        <span class="label">Discount Coupon:</span>
        <span class="value">LKR {{ $discountCoupon }}</span>
    </div>
    <div class="totals-row">
        <span class="label">Final Total:</span>
        <span class="value">LKR {{ $finalTotal }}</span>
    </div>

    
    <div class="action-buttons">
    <a href="{{ route('shop') }}" class="btn">Continue shopping</a>
    <a href="{{ route('checkout.view') }}" class="btn btn-success">Checkout</a>
    </div>
</div>





        </div>
    </div>
</body>
</html>
