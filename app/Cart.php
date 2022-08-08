<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id', 'product_id', 'quantity', 'amount', 'price'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
