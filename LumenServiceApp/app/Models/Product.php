<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model{
    // Post -> table name = posts
    // customed table name;
    // protected $table = 'posts';
    protected $fillable = ['product_name','product_description','category_id','product_brand','product_price','product_stock'];

    public $timestamps = true; //untuk melakukan update kolom created_at dan updated_at

}