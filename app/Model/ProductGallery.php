<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductGallery extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'product_id',
        'gallery_image'
    ];

    protected $date = [
        'deleted_at'
    ];

    public static function imageGallery($filename, $product_id){
        if(request()->hasfile($filename)){

            foreach(request()->$filename as $file){

                $filename = rand().'.'.$file->getClientOriginalExtension();
                $newfile = new ProductGallery();
                $newfile->product_id = $product_id;
                $newfile->gallery_image = $filename;

                if($newfile->save()){
                    $file->move('image/galleries', $filename);
                }
            }
        }
    }

    public static function imageGalleryUpdate($filename, $product_id){
        if(request()->hasfile($filename)){

            foreach(request()->$filename as $file){

                $filename = rand().'.'.$file->getClientOriginalExtension();
                $newfile = new ProductGallery();
                $newfile->product_id = $product_id;
                $newfile->gallery_image = $filename;

                if($newfile->save()){
                    $file->move('image/galleries', $filename);
                }
            }
        }
    }
}
