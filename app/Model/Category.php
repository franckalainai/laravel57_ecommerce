<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'category_name',
        'description',
        'is_active',
        'image'
    ];

    public static function image($filename, $category){
        if(request()->hasfile($filename)){
            $file = request()->file($filename);
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('image/categories', $filename);
            $category->image = $filename;
        }
    }

    //------------Product join with category---------
    public function products(){
        return $this->hasMany("App\Model\Product");
    }
}
