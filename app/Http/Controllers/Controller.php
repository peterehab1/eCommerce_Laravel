<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use App\User;
use App\Product;
use App\Address;
use App\Payment;
use Auth;


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


    public function create_new_address(){

        return view('address');
    }

    public function store_new_address(Request $request){

            $address = new Address;

            $phone_number_address = $request->code_address . $request->phone_address;
            $address->user_id = Auth::id();
            $address->first_name = $request->first_name_address;
            $address->last_name = $request->last_name_address;
            $address->phone = $phone_number_address;
            $address->address = $request->address_address;
            $address->state = $request->state_address;
            $address->country = $request->country_address;
            $address->save();
           
             return redirect('order/create');
        
        
    }


    public function create_new_payment(){

            return view('payment');

    }


    public function store_new_payment(Request $request){
      

        $payment = new Payment;

        $phone_number_payment = $request->code_payment . $request->phone_payment;
        $card_exp_date = $request->card_exp_month . $request->card_exp_year;


            $payment->user_id = Auth::id();
            $payment->first_name = $request->first_name_payment;
            $payment->last_name = $request->last_name_payment;
            $payment->phone = $phone_number_payment;
            $payment->network = $request->network;
            $payment->card_number = $request->card_number;
            $payment->address = $request->address_payment;
            $payment->country = $request->country_payment;
            $payment->cvv = $request->cvv;
            $payment->exp = $card_exp_date;
            $payment->save();

            return redirect('order/create');

    }

}
