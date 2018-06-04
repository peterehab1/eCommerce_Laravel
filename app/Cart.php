<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function product(){

    	return $this->hasMany('App\Product', 'id', 'product_id');

    }

    public function user(){

    	return $this->hasMany('App\User', 'id', 'user_id');

    }

    public function color(){

    	return $this->hasMany('App\Color', 'id', 'color_id');
    }

    public function size(){

    	return $this->hasMany('App\Size', 'id', 'size_id');
    }
}
