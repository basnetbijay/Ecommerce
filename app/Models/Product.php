<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable= [
        // 'product_id',
        'name',
         'category' ,
          'brand',
        'size',
         'color',
          'quantity',
           'price',
            'image'
    ];
}
