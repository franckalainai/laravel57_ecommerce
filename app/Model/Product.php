<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category_id', 'product_code', 'product_name', 'qty', 'price', 'is_active',	'description','image'
    ];

    protected $dates = [
        'deleted_at'
    ];

    public static function image($filename, $product){
        if(request()->hasfile($filename)){
            $file = request()->file($filename);
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('image/products', $filename);
            $product->image = $filename;
        }
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
