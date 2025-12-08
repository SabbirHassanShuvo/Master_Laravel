<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $table = 'products';
    protected $fillable = ['name', 'type', 'category', 'brand', 'unit', 'tags', 'exchangeable', 'refundable', 'status'];
    
    protected $casts = [
        'tags' => 'array',
        'exchangeable' => 'boolean',
        'refundable' => 'boolean',
        'status' => 'boolean'
    ];
}
