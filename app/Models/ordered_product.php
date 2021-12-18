<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ordered_product extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'name',
        'size',
        'quantity',
        'other_addons',
        'price',
        'product_id',
        'order_id',
    ];
}
