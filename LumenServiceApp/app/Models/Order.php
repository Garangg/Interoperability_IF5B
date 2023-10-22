<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model{
    // Order -> table name = orders
    // customed table name;
    // protected $table = 'orders';
    protected $fillable = ['customer_id','order_name','order_description','order_date','order_shipping_address','order_status'];

    public $timestamps = true; //untuk melakukan update kolom created_at dan updated_at

}