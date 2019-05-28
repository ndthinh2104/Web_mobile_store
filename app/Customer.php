<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customer";

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'address',
        'note',
        'gender'
    ];

    public function bill(){
    	return $this->hasMany('App\Bill','id_customer','id');
    }

}
