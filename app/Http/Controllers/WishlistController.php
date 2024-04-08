<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Product;


class WishlistController extends Controller
{
    public function getWishlistedProducts()
    {
        // $items = Cart::instance("wishlist")->content();
        // dd($items);
        $items=Product::all();
        return view('wishlist',compact('items'));
    }

    public function addProductToWishlist(Request $request)
    {
        $product = Product::find($request->id);
        $price = $product->sale_price ? $product->sale_price : $product->regular_price;

        Cart::instance("wishlist")->add($request->id, $request->name, 1, $price)->associate('App\Models\Product');
        return redirect()->back()->with('message','Success ! item succrssfully added to your wishlist');
        //return response()->json(['status'=>200,'message'=>'Success ! item succrssfully added to your wishlist']);
    }
}
