<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = "type_products";

    public function product_type(){
    	return $this->belongsTo('App\ProductType','id_type','id');
    }

    public function bill_detail(){
    	return $this->hasMany('App\BillDetail','id_product','id');
    }
}
