<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'order_id',	'product_id', 'color_id', 'qty', 'price', 'amount'
    ];

    protected $dates = ['deleted_at'];
}
