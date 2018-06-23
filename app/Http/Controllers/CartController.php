<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\User;
use App\Product;
use Auth;
use DB;



class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   
    public function index()
    {
        $cart = Cart::all()->where('user_id', Auth::id())->where('ordered', 0);
        $total = 0;

        

        //Get the Sum of the order
        foreach ($cart as $c) {
            $total = $total + $c->product->first()->price * $c->quantity;
        }
        
        return view('carts.show', compact('cart', $cart, 'total', $total));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart = new Cart;
        $checkIfQuantityChanged = Cart::where('product_id', $request->product_id)->where('user_id', $request->user_id)->where('color_id', $request->color_id)->where('size_id', $request->size_id);
       

        
        if ($checkIfQuantityChanged->first()) {
            
            $newQuantity = $checkIfQuantityChanged->first()->quantity + $request->quantity;
            $checkIfQuantityChanged->update(['quantity' => $newQuantity]);
            return view('carts.show');

        }else{

            $cart->product_id = $request->product_id;
            $cart->product_key = $request->product_key;
            $cart->quantity = $request->quantity;
            $cart->color_id = $request->color_id;
            $cart->size_id = $request->size_id;
            $cart->user_id = $request->user_id;
            $cart->save();

            return view('carts.show');  
        }

        /*

            $cart->product_id = $request->product_id;
            $cart->product_key = $request->product_key;
            $cart->quantity = $request->quantity;
            $cart->color_id = $request->color_id;
            $cart->size_id = $request->size_id;
            $cart->user_id = $request->user_id;
            $cart->save();

            return view('carts.show');        
        */
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cart = Cart::find($id);
        if ($cart != '') {
            
            return redirect('/');
        }else{

            return redirect('/');
        }
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
        
        Cart::where('id', $id)->update(['quantity' => $request->quantity]);
        return view('carts.show');        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return back();
    }
}
