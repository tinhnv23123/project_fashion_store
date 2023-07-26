<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function index(){
        $products = Product::orderBy('id', 'desc')->paginate(10);
        $categories = Category::all();
        $products ->load(
            [
                'brand',
                'category'
            ]
        );
        return view('client.home', compact(['products', 'categories']));
    }
    public function redirect(){
       $role_id = Auth::user()->role_id;
       if($role_id == 0 || $role_id == 2){
        return view('admin.dashboard');
       }else{ 
        return redirect("/");
       }
    }

    public function products(){
        $products = Product::orderBy('created_at', 'desc')->paginate(12);
        $categories = Category::all();
        $products ->load(
            [
                'brand',
                'category'
            ]
        );
        return view('client.products', compact(['products', 'categories']));
    }
}
