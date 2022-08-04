<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    //$guarded insert all feild
    protected $guarded = [];
    public function images () {
        return $this->hasMany(ProductImage::class,'product_id'); // laravel eloquent-relationships
    }
    public function tags () {
        return $this->belongsToMany(Tag::class, 'product_tags' , 'product_id', 'tag_id')->withTimestamps(); //('ten model lien quan' , 'ten key lien quan' , 'key model lien quan den modal Tag da define')
    }
    public function categoriesInstance (){
        return $this->belongsTo(Category::class, 'categories_id'); // belongto phuong thuc product trong cate
    } 
}
