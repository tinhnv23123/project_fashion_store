<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // View cart
    public function viewcart()
    {
        if (Auth::id()) {
            $categories = Category::all();
            $id = Auth::user()->id;
            $carts = Cart::where('user_id', '=', $id)->get();

            return view('client.cart', compact(['carts', 'categories']));
        } else {
            return redirect('login');
        }
    }

    // Add cart
    public function add_to_cart(Request $request, $id)
    {
        if (Auth::id()) {
            $user = Auth::user();
            $product = Product::find($id);
            $cart = new Cart;
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;
            $cart->product_name = $product->product_name;
            if ($product->discount_price != null || $product->discount_price != 0) {
                $cart->price = ($product->price - $product->discount_price);
            } else {
                $cart->price = $product->price;
            }
            $cart->total = $cart->price * $request->quantity;
            $cart->image = $product->image;
            $cart->product_id = $product->id;
            $cart->quantity = $request->quantity;
            $cart->save();
            return redirect()->back();
        } else {
            return redirect('login');
        }
    }
    // Remove Cart
    public function remove_cart($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect('/viewcart');
    }

}
