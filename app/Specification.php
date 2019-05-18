<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    protected $table = "specification";

    public function specification() {
        return $this->belongsTo('App\Product','id','id_product');
    }
}
