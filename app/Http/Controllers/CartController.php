<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Log;

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
    public function checkout(Request $request)
    {
        if (Auth::id()) {
            $categories = Category::all();
            $id = Auth::user()->id;
            $carts = Cart::where('user_id', '=', $id)->get();
            // Kiểm tra nếu giỏ hàng rỗng
            if ($carts->isEmpty()) {
                // Redirect hoặc trả về view thông báo giỏ hàng rỗng
                return redirect('/viewcart')->with('message', 'Giỏ hàng của bạn trống trơn 😥😥😥. Vui lòng thêm các mặt hàng vào giỏ hàng trước khi thanh toán!!!');
            } else {
                return view('client.checkout', compact(['carts', 'categories']));
            }
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
            if ($carts->isEmpty()) {
                // Redirect hoặc trả về view thông báo giỏ hàng rỗng
                return redirect('/viewcart')->with('message', 'Your cart is empty. Please add items to your cart before proceeding to checkout.');
            } else {
                return view('client.shipping', compact(['carts', 'categories', 'cart']));
            }
        } else {
            return redirect('login');
        }
    }
    public function checkship(Request $request, User $user)
    {
        $user = Auth::user();
        $categories = Category::all();
        $id = Auth::user()->id;
        $carts = Cart::where('user_id', '=', $id)->get();
        if ($carts->isEmpty()) {
            // Redirect hoặc trả về view thông báo giỏ hàng rỗng
            return redirect('/viewcart')->with('message', 'Your cart is empty. Please add items to your cart before proceeding to checkout.');
        } else {
            // Lấy thông tin từ form submission
            $shippingInfo = [
                'email' => $request->input('email') ?? $user->email,
                'name' => $request->input('name') ?? $user->name,
                'address' => $request->input('address') ?? $user->address,
                'phone' => $request->input('phone') ?? $user->phone,
            ];
            $request->session()->put('shippingInfo', $shippingInfo);
            // dd($shippingInfo);
            return view('client.shipping', compact('shippingInfo', 'categories', 'carts'));
        }
    }

    public function order(Request $request, User $user)
    {
        $user = Auth::user();
        $categories = Category::all();
        $userid = Auth::user()->id;
        $carts = Cart::where('user_id', '=', $userid)->get();
        $data = Cart::where('user_id', '=', $userid)->get();
        $shippingInfo = $request->session()->get('shippingInfo');
        if ($carts->isEmpty()) {
            // Redirect hoặc trả về view thông báo giỏ hàng rỗng
            return redirect('/viewcart')->with('message', 'Giỏ hàng bạn đang không có gì 😥😥😥. Vui lòng thêm các mặt hàng vào giỏ hàng của bạn');
        } else {
            $order = new Order();
            $order->name = $shippingInfo['name'] ?? '';
            $order->email = $shippingInfo['email'] ?? '';
            $order->phone = $shippingInfo['phone'] ?? '';
            $order->address = $shippingInfo['address'] ?? '';
            $order->user_id = $user->id;
            $productNames = [];
            $quantities = [];
            $prices = [];
            $images = [];
            $productIds = [];
            $totals = [];
            foreach ($data as $cartItem) {
                $productNames[] = $cartItem->product_name;
                $quantities[] = $cartItem->quantity;
                $prices[] = $cartItem->price;
                $images[] = $cartItem->image;
                $productIds[] = $cartItem->product_id;
                $totals[] = $cartItem->total;
            }

            $order->product_name = implode(', ', $productNames);
            $order->quantity = implode(', ', $quantities);
            $order->price = implode(', ', $prices);
            $order->image = implode(', ', $images);
            $order->product_id = implode(', ', $productIds);
            $order->pay_method = "Payment on delivery";
            $order->total = array_sum($totals);
            $order->delivery_status = 'Pending';
            $order->save();
            $request->session()->forget('shippingInfo');
            Cart::where('user_id', $user->id)->delete();
            return redirect('/bill');
        }
    }
    public function bill()
    {
        if (Auth::id()) {
            $categories = Category::all();
            $id = Auth::user()->id;
            $carts = Cart::where('user_id', '=', $id)->get();
            $user = Auth::user();
            $order = Order::where('user_id', $user->id)->latest()->first(); // Lấy đơn hàng mới nhất {
            // Kiểm tra nếu không có đơn hàng, chuyển hướng về trang chủ hoặc trang thông báo lỗi
            if (!$order) {
                return redirect('/'); // Chuyển hướng về trang chủ
                // Hoặc hiển thị trang thông báo lỗi nếu có
                // return view('error')->with('message', 'Không có đơn hàng nào.');
            }

            // Lấy thông tin các sản phẩm đã đặt hàng trong đơn hàng
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

                return view('client.bill', compact('order', 'products', 'categories', 'carts'));
            }
        } else {
            return redirect('login');
        }
    }

    public function myorder()
    {
        if (Auth::id()) {
            $categories = Category::all();
            $id = Auth::user()->id;
            $carts = Cart::where('user_id', '=', $id)->get();
            $orders = Order::where('user_id', '=', $id)->orderBy('id', 'desc')->paginate(10);
            // dd($orders);
            return view('client.myorder', compact(['carts', 'categories', 'orders']));
        } else {
            return redirect('login');
        }
    }
    public function viewOrderDetail($orderId)
    {
        if (Auth::id()) {
            $categories = Category::all();
            $id = Auth::user()->id;
            $carts = Cart::where('user_id', '=', $id)->get();
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
            return view('client.orderdetail', compact(['carts', 'categories', 'order', 'products']));
        } else {
            return redirect('login');
        }
    }
}
