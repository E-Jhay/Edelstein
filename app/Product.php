<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'regular_price',
        'sale_price',
        'quantity',
        'image1',
        'image2',
        'category_id'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
