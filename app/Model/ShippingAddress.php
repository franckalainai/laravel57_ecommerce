<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShippingAddress extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'customer_id',' order_id', 'name',	'phone', 'city', 'commune',	'village', 'district', 'postcode', 'is_active'
    ];

    protected $primaryKey = 'id';

    protected $dates = ['deleted_at'];
}
