<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Color;
use App\Size;


use App\Helpers;


class ProductController extends Controller
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
        $category = Category::all();
        return view('products.create', compact('category', $category));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $product = new Product;

        $color1 = $request->product_color_1;
        $color2 = $request->product_color_2;
        $color3 = $request->product_color_3;

        $size1 = $request->product_size_1;
        $size2 = $request->product_size_2;
        $size3 = $request->product_size_3;
    
        $key = uniqueKey($request); // => Get a Unique Key for the Product

        //Move Uploaded Image to the uploads Folder
        $image = $request->file('product_image');
        $input['product_image'] = pathinfo($_FILES['product_image']['name'], PATHINFO_FILENAME).'.'. $key .'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('assets/images/uploads');
        $image->move($destinationPath, $input['product_image']);

        //Insert into Database
        $product->image = $input['product_image'];
        $product->name = $request->product_name;
        $product->product_key = $key; 
        $product->price = $request->product_price;
        $product->desc = $request->product_desc;
        $product->category_id = $request->product_category;
        $product->gender = $request->product_gender;
        $product->stock = $request->product_stock;
        $product->user_id = $request->user_id;
        $product->save();

        hasColor($color1, 'Nothing_1', $key); // => If Product has Colors , Add Them the Database
        hasColor($color2, 'Nothing_2', $key); // => If Product has Colors , Add Them the Database
        hasColor($color3, 'Nothing_3', $key); // => If Product has Colors , Add Them the Database

        hasSize($size1, 'Null_1', $key); // => If Product has Sizes , Add Them the Database
        hasSize($size2, 'Null_2', $key); // => If Product has Sizes , Add Them the Database
        hasSize($size3, 'Null_3', $key); // => If Product has Sizes , Add Them the Database



        return redirect('user/'.$request->user_id.'');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('status', 1)->find($id);
        $colors = Color::all()->where('product_key', $product['product_key']);
        $sizes = Size::all()->where('product_key', $product['product_key']);
        
        
        if($product){
            return view('products.product', compact('product', $product, 'colors', $colors, 'sizes', $sizes));
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
        Product::where('id', $id)->update(['name' => $request->product_name, 'price' => $request->product_price, 'desc' => $request->product_desc, 'category_id' => $request->product_category, 'stock' => $request->product_stock]);
        return back();    
    }

    public function pause($id){

        Product::where('id', $id)->update(['status' => 0]);
        return back();
    }

    public function continue($id){

        Product::where('id', $id)->update(['status' => 1]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return back();
    }
}
