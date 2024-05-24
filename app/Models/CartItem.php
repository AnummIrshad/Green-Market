<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_slug',
        'quantity',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_slug', 'slug');
    }
}
