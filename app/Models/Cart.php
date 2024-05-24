<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = [
        'customer_id',
        'product_id',
        'order_number',
        'status',
        'total_amount',
        'quantity',
        'unit_price',
        'added_to_cart_at',
        'subtotal',
        'discounts',
        'taxes',
        'shipping_cost',
        'grand_total',
    ];

    /**
     * Get the user that owns the cart.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    /**
     * Get the products in the cart.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'cart_product', 'cart_id', 'product_id')
            ->withPivot('quantity'); // If you want to store the quantity in the pivot table
    }


}
