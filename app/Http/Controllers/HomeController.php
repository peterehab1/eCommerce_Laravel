<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Blog;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_men = Product::all()->where('status', 1)->where('gender', 1)->take(5);
        $product_women = Product::all()->where('status', 1)->where('gender', 2)->take(5);
        $blogs = Blog::orderByRaw('created_at DESC')->take(2)->get();
        return view('home', compact('product_women', $product_women, 'product_men', $product_men, 'blogs', $blogs));
    }
}
