<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

            $cart = Cart::where('product_id', $product->id)
                ->where('user_id', $user->id)
                ->first();

            if ($cart) {
                // Nếu sản phẩm đã tồn tại trong giỏ hàng, cộng dồn số lượng mới vào số lượng hiện tại
                $cart->quantity += $request->quantity;
                // Cập nhật tổng giá tiền sau khi cộng dồn số lượng
                $cart->total = $cart->price * $cart->quantity;
            } else {
                // Nếu sản phẩm chưa tồn tại, thêm sản phẩm mới vào giỏ hàng
                $cart = new Cart();
                $cart->user_id = $user->id;
                $cart->product_id = $product->id;
                $cart->product_name = $product->product_name;

                if ($product->discount_price !== null && $product->discount_price !== 0) {
                    $cart->price = ($product->price - $product->discount_price);
                } else {
                    $cart->price = $product->price;
                }
                $cart->name = $user->name;
                $cart->email = $user->email;
                $cart->phone = $user->phone;
                $cart->address = $user->address;
                // Đặt số lượng và tổng giá tiền cho sản phẩm mới
                $cart->quantity = $request->quantity;
                $cart->total = $cart->price * $request->quantity;
                $cart->image = $product->image;
            }

            $cart->save();

            return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng.');
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
    // Clear cart
    // Update cart
    public function updateOrClearCart(Request $request)
    {
        $action = $request->input('action');

        if ($action === 'update') {
            $cartData = $request->input('quantity');
                if (!empty($cartData) && is_array($cartData)) {
                    foreach ($cartData as $cartId => $quantity) {
                        // Kiểm tra xem số lượng sản phẩm có hợp lệ không (ví dụ, không âm)
                        $quantity = max(1, (int) $quantity);
        
                        // Cập nhật số lượng sản phẩm trong giỏ hàng
                        $cartItem = Cart::find($cartId);
                        if ($cartItem) {
                            $cartItem->quantity = $quantity;
                            $cartItem->total = $quantity * $cartItem->price;
                            $cartItem->save();
                        }
                    }
                    return redirect('/viewcart')->with('success', 'Giỏ hàng đã được cập nhật thành công.');
                }
        } elseif ($action === 'clear') {
            // Xóa toàn bộ giỏ hàng
            Cart::truncate();
            return redirect('/viewcart')->with('success', 'Cart cleared successfully.');
        }
        return redirect('/viewcart');
    }
    // Check out
    public function checkout()
    {
        if (Auth::id()) {
            $categories = Category::all();
            $id = Auth::user()->id;
            $carts = Cart::where('user_id', '=', $id)->get();
            return view('client.checkout', compact(['carts', 'categories']));
        } else {
            return redirect('login');
        }
    }
    public function shipping()
    {
        if (Auth::id()) {
            $categories = Category::all();
            $id = Auth::user()->id;
            $carts = Cart::where('user_id', '=', $id)->get();
            $cart = Cart::first();
            return view('client.shipping', compact(['carts', 'categories', 'cart']));
        } else {
            return redirect('login');
        }
    }
    public function bill()
    {
        if (Auth::id()) {
            $categories = Category::all();
            $id = Auth::user()->id;
            $carts = Cart::where('user_id', '=', $id)->get();
            $cart = Cart::first();
            return view('client.bill', compact(['carts', 'categories', 'cart']));
        } else {
            return redirect('login');
        }
    }
}
