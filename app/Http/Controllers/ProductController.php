<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class ProductController extends Controller
{
    //Products slide
    function index()
    {
        $data=Product::all();
        return view('product',['products'=>$data]);
    }
    //Trending product
    function detail($id)
    {
        $data= Product::find($id);
        return view('detail',['product'=>$data]);
    }
    //Add products in cart table
    function addToCart(Request $req)
    {
        if($req->session()->has('user'))
        {
            $cart= new Cart;
            $cart->user_id=$req->session()->get('user')['id'];
            $cart->product_id=$req->product_id;
            $cart->save();
            return redirect('/');

        }
        else
        {
            return redirect('/login');
        }
    }
}
