<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model{
    // Post -> table name = posts
    // customed table name;
    // protected $table = 'posts';
    protected $fillable = ['name','description','price','quantity'];
}