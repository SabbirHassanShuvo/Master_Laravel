<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'type',
        'category',
        'subcategory',
        'brand',
        'unit',
        'tags',
        'exchangeable',
        'refundable',
        'description',
        'price',
        'compare_price',
        'cost_per_item',
        'sku',
        'stock_status'
    ];
}
