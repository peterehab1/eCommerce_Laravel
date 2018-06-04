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


    public function category($id){

        $category_products = Product::where('category_id', $id)->paginate(16);
        $products_count = Product::all()->where('category_id', $id)->count();

        return view('category', compact('category_products', $category_products, 'products_count', $products_count));

    }
}
