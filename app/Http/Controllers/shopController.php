<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class shopController extends Controller
{
    // public function shop(){
    //     return view('Registered.shop');
    // }

    public function shop(){
        $products = Product::orderBy('created_at','DESC')->paginate(12);
        return view('Registered.shop',compact('products'));
    }

    public function product_details($product_slug){

        $product = Product::where('slug',$product_slug)->first();
        return view('Registered.details',compact('product'));

    }
}
