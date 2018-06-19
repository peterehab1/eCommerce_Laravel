<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Address;
use App\Payment;
use App\Order;

use Auth;
use Session;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cart = Cart::all()->where('user_id', Auth::id())->where('ordered', 0);
        $addresses = Address::all()->where('user_id', Auth::id());
        $payments = Payment::all()->where('user_id', Auth::id());

        //Check to see if User Add Items to Cart
        if ($cart->first() != '') {
            
            //Check to see if User have any Saved Addresses
            if($addresses->first() == ''){

            return view('address');

            //Check to see if User have any Saved Payments Info
            }elseif($payments->first() == ''){

            return view('payment');

            }else{

            return view('orders.create', compact('cart', $cart, 'addresses', $addresses, 'payments', $payments));

            }
        }else{
            return redirect('/');
        }

        

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $order = new Order;

        $order->total = $request->total;
        $order->user_id = Auth::id();
        $order->address_id = $request->address_id;
        $order->payment_id = $request->payment_id;
        $order->save();

        Cart::where('user_id', Auth::id())->where('ordered', 0)->update(['ordered' => 1]);

        Session::flash('message', 'Congratulations, Your order has been placed and Your Info Under Review'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect('/');
    }

   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
