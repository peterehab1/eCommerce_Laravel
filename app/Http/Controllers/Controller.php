<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\User;
use  App\Product;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function user($id){

    	$user = User::find($id);
    	if ($user) {
    		$count = Product::where('user_id', $id)->count();
	    	$products = Product::all()->where('user_id', $id);
	    	return view('profile', compact('user', $user, 'count', $count, 'products', $products));
    	}else{

    		return redirect('/');
    	}
    	
    }
}
