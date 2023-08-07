<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $role_id = Auth::user()->role_id;
        if ($role_id == 0 || $role_id == 2) {
            $orders = Order::orderBy('id', 'desc')->paginate(10);
            // dd($orders);
            return view('admin.orders.index', compact(['orders']));
        } else {
            return redirect("/");
        }
    }
    public function orderDetail($orderId)
    {
        $role_id = Auth::user()->role_id;
        if ($role_id == 0 || $role_id == 2) {
            $order = Order::findOrFail($orderId);

            $products = [];
            $productNames = explode(', ', $order->product_name);
            $quantities = explode(', ', $order->quantity);
            $prices = explode(', ', $order->price);
            $totals = explode(', ', $order->total);
            $imageUrls = explode(', ', $order->image);

            // Ghép thông tin các sản phẩm vào mảng $products
            for ($i = 0; $i < count($productNames); $i++) {
                $product = [
                    'product_name' => $productNames[$i],
                    'quantity' => $quantities[$i],
                    'price' => $prices[$i],
                    'image' => $imageUrls[$i],
                ];
                $products[] = $product;
            }
            return view('admin.orders.order_detail', compact(['order', 'products']));
        } else {
            return redirect("/");
        }
    }
    public function delivered(Request $request, Order $order, $id){
        $role_id = Auth::user()->role_id;
        if ($role_id == 0 || $role_id == 2) {
            $order = Order::findOrFail($id);
            // dd($orders);
            $order->delivery_status = "Processed";
            $order->save();
            return redirect()->back();
        } else {
            return redirect("/");
        }
    }
}
