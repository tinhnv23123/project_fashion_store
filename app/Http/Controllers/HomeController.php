<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(10);
        $categories = Category::all();
        if (Auth::id()) {
            $id = Auth::user()->id;
            $carts = Cart::where('user_id', '=', $id)->get();
            $users = User::all();
        } else {
            $carts = [];
            $users = [];
        }
        $products->load(
            [
                'brand',
                'category',
            ]
        );
        $bestsellers = Product::orderBy('id', 'desc')->paginate(5);
        return view('client.home', compact(['products', 'categories', 'bestsellers', 'carts', 'users']));
    }
    public function redirect()
    {
        $role_id = Auth::user()->role_id;
        if ($role_id == 0 || $role_id == 2) {
            return view('admin.dashboard');
        } else {
            return redirect("/");
        }
    }

    public function products()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(12);
        $categories = Category::all();
        $brands = Brand::all();
        if (Auth::id()) {
            $id = Auth::user()->id;
            $carts = Cart::where('user_id', '=', $id)->get();
            $users = User::all();
        } else {
            $carts = [];
            $users = [];
        }
        $products->load(
            [
                'brand',
                'category'
            ]
        );
        return view('client.products', compact(['products', 'categories', 'brands', 'carts']));
    }
    public function detail(Request $request, Product $product, $id)
    { {
            // Lấy thông tin sản phẩm từ CSDL bằng ID
            $product = Product::find($id);
            $categories = Category::all();
            $brands = Brand::all();
            $products = Product::orderBy('id', 'desc')->paginate(6);
            // Kiểm tra nếu sản phẩm không tồn tại
            if (!$product) {
                abort(404);
            }
            if (Auth::id()) {
                $id = Auth::user()->id;
                $carts = Cart::where('user_id', '=', $id)->get();
                $users = User::all();
            } else {
                $carts = [];
                $users = [];
            }
            $product->load(
                [
                    'brand',
                    'category',
                ]
            );
            // dd($products);
            // Trả về view hiển thị chi tiết sản phẩm và truyền dữ liệu của sản phẩm đó
            return view('client.product_detail', compact('product', 'categories', 'brands', 'carts', 'products'));
        }
    }
}
