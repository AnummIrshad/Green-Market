<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

   // protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'description',
        'unit_price',
        'vendor_name',
        'item_category',
        'stocks',
        'slug',
        'product_image_url',
    ];

    // Accessor to map the 'product_name' attribute to 'name'
public function getNameAttribute()
{
    return $this->attributes['product_name'];
}

   
}
