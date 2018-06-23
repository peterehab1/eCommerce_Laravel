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
use App\Category;
use App\Cart;
use App\Contact;

use Auth;
use DB;
use Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function user($id){

    	$user = User::find($id);
    	if ($user) {
    		$count = Product::where('user_id', $id)->where('status', 1)->count();
	    	$products = Product::all()->where('user_id', $id);
            $category = Category::all();
	    	return view('profile', compact('user', $user, 'count', $count, 'products', $products, 'category', $category));
    	}else{

    		return redirect('/');
    	}
    	
    }

    public function orders($id)
    {
        if ($id == Auth::id()) {
           
            $user = User::find($id);
            $cart = DB::table('carts')->get();
            $order_count = Cart::all()->where('user_id', $id)->where('ordered', 1)->count();
            $product_count = Product::where('user_id', $id)->count();
            return view('orders.show', compact('cart', $cart, 'user', $user, 'product_count', $product_count, 'order_count', $order_count));

        }else{

            return redirect('/');
        }
    }


    public function category_men($id){

        $category_products = Product::where('category_id', $id)->where('status', 1)->where('gender', 1)->paginate(16);
        $products_count = Product::all()->where('category_id', $id)->where('status', 1)->where('gender', 1)->count();

        return view('category', compact('category_products', $category_products, 'products_count', $products_count));

    }

    public function category_women($id){

        $category_products = Product::where('category_id', $id)->where('status', 1)->where('gender', 2)->paginate(16);

        $products_count = Product::all()->where('category_id', $id)->where('status', 1)->where('gender', 2)->count();

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


    public function search(Request $request){
        
        $word = $request->search_word;
        $products = Product::where('name','LIKE','%'.$word.'%')->orWhere('desc','LIKE','%'.$word.'%')->paginate(16);
        $products_count = Product::where('name','LIKE','%'.$word.'%')->orWhere('desc','LIKE','%'.$word.'%')->count();
        if ($products->first() != '') {
            return view('search', compact('products', $products, 'word', $word, 'products_count', $products_count));
        }else{

            Session::flash('message', 'We did not found any matches with your search , Try again and use simple words.'); 
            Session::flash('alert-class', 'alert-danger'); 
            return redirect('/');
        }
    }

    public function contact_get(){
       
       return view('contact');
    }

    public function contact_send(Request $request){
       
       $contact = New Contact;
       $full_name = $request->first_name . ' ' . $request->last_name;

       $contact->name = $full_name;
       $contact->email = $request->email;
       $contact->message = $request->message;
       $contact->save();

       Session::flash('message', 'Your message has been sent.'); 
       Session::flash('alert-class', 'alert-success'); 
       return redirect('/');


    }

}
