<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function colors()
    {
    	return $this->hasMany('App\Color');
    }

    public function Category(){

    	return $this->belongsTo('App\Category');
    }

    public function cart(){

    	return $this->belongsTo('App\Cart');
    }

    
}
