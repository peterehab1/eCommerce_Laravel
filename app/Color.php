<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    public function colors()
    {
    	return $this->belongsTo('App\Product');
    }
}
