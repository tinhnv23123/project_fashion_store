<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Console\View\Components\Alert as ComponentsAlert;
// use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class BrandController extends Controller
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
            $brands = Brand::paginate(5);
            return view('admin.brands.index', [
                'brands' => $brands,
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
            return view('admin.brands.create');
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
    public function store(StoreBrandRequest $request)
    {
        $role_id = Auth::user()->role_id;
        if ($role_id == 0 || $role_id == 2) {

            $brand_name = $request->input('brand_name');
            $description = $request->input('description');
            $data = [
                'brand_name' => $brand_name,
                'description' => $description
            ];
            Brand::create($data);
            Alert::success('Add successfully');
            return redirect()->route('brand.index');
        } else {
            return redirect("/");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        $role_id = Auth::user()->role_id;
        if ($role_id == 0 || $role_id == 2) {
            return view('admin.brands.edit', compact('brand'));
        } else {
            return redirect("/");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $role_id = Auth::user()->role_id;
        if ($role_id == 0 || $role_id == 2) {
            $brand_name = $request->input('brand_name');
            $description = $request->input('description');
            $data = [
                'brand_name' => $brand_name,
                'description' => $description
            ];
            $brand->fill([
                'brand_name' => $brand_name,
                'description' => $description
            ])->save();
            Alert::success('Edit successfully');
            return redirect()->route('brand.index');

        } else {
            return redirect("/");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $role_id = Auth::user()->role_id;
        if ($role_id == 0 || $role_id == 2) {
            $productsCount = Product::where('brand_id', $brand->id)->count();
            if ($productsCount > 0) {
                Alert::error('Delete failed', 'There are products containing this brand');
                return redirect()->route('brand.index');
            }
            $brand->forceDelete();
            Alert::success('Delete successfully');
            return redirect()->route('brand.index');
        } else {
            return redirect("/");
        }
    }
}
