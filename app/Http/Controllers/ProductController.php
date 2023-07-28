<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role_id = Auth::user()->role_id;
        if ($role_id == 0 || $role_id == 2) {
            $products = Product::orderBy('id', 'desc')->paginate(5);
            $products->load([
                'category',
                'brand'
            ]);
            return view("admin.products.index", [
                'products' => $products,
            ]);
        } else {
            return redirect("/");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role_id = Auth::user()->role_id;
        if ($role_id == 0 || $role_id == 2) {
            $categories = Category::all();
            $brands = Brand::all();
            return view('admin.products.create', [
                'categories' => $categories,
                'brands' => $brands
            ]);
        } else {
            return redirect("/");
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $role_id = Auth::user()->role_id;
        if ($role_id == 0 || $role_id == 2) {
            $product_name = $request->input('product_name');
            $description = $request->input('description');
            $category_id = $request->input('category_id', 1);
            $discount_price = $request->input('discount_price');

            // Kiểm tra xem id danh mục tồn tại trong cơ sở dữ liệu
            $category = Category::find($category_id);

            // Nếu không tồn tại, sử dụng danh mục mặc định có id là 1
            if (!$category) {
                $category_id = 1;
            }

            $brand_id = $request->input('brand_id', 1);

            // Kiểm tra xem id danh mục tồn tại trong cơ sở dữ liệu
            $brand = Brand::find($brand_id);

            // Nếu không tồn tại, sử dụng danh mục mặc định có id là 1
            if (!$brand) {
                $brand_id = 1;
            }
            $price = $request->input('price');
            $image = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/image', $image);

            $data = [
                'product_name' => $product_name,
                'description' => $description,
                'category_id' => $category_id,
                'brand_id' => $brand_id,
                'price' => $price,
                'discount_price' =>$discount_price,
                'image' => $image,
            ];
            Product::create($data);
            Alert::success('Add successfully');
            return redirect()->route('product.index')->with('success', "Product has been create successfully");
        } else {
            return redirect("/");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $role_id = Auth::user()->role_id;
        if ($role_id == 0 || $role_id == 2) {
            $categories = Category::all();
            $brands = Brand::all();
            return view('admin.products.edit', [
                'categories' => $categories,
                'brands' => $brands
            ], compact('product'));
        } else {
            return redirect("/");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $role_id = Auth::user()->role_id;
        if ($role_id == 0 || $role_id == 2) {
            $product_name = $request->input('product_name');
            $description = $request->input('description');
            $category_id = $request->input('category_id');
            $brand_id = $request->input('brand_id');
            $price = $request->input('price');
            $discount_price = $request->input('discount_price');
            $product->fill([
                'product_name' => $product_name,
                'description' => $description,
                'category_id' => $category_id,
                'brand_id' => $brand_id,
                'price' => $price,
                'discount_price' => $discount_price
            ])->save();
            if ($request->file('image') !== null) {
                $image = $request->file('image')->getClientOriginalName();
                $request->file('image')->storeAs('public/image', $image);
                $product->fill([
                    'image' => $image
                ])->save();
            };
            Alert::success('Update successfully');
            return redirect()->route('product.index')->with('success', "Product update successfully");
        } else {
            return redirect("/");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $role_id = Auth::user()->role_id;
        if ($role_id == 0 || $role_id == 2) {
            $product->forceDelete();
            Alert::success('Delete successfully');
            return redirect()->route('product.index');
        } else {
            return redirect("/");
        }
    }

    public function deleteMultiple(Request $request)
    {

        $role_id = Auth::user()->role_id;
        if ($role_id == 0 || $role_id == 2) {
            $selectedIds = $request->input('selectedIds', []);

            if (!empty($selectedIds)) {
                // Thực hiện xóa hoặc cập nhật trạng thái xóa cho các sản phẩm đã chọn
                // Đoạn code sau đây dùng để xóa vĩnh viễn các sản phẩm, nếu bạn muốn cập nhật trạng thái xóa, hãy sử dụng phương thức update thay vì delete.
                Product::whereIn('id', $selectedIds)->delete();
                Alert::success('Delete successfully');
                return redirect()->route('product.index');
            } else {
                Alert::error('Delete Failed');
                return redirect()->route('product.index');
            }
        } else {
            return redirect("/");
        }
    }
}
