<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'customer_id', 'user_id', 'deliver_id', 'payment_id', 'status_id', 'coupon_id', 'transaction_date'
    ];

    protected $dates = ['deleted_at'];
}
