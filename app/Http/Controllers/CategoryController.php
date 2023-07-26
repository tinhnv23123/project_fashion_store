<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
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
            $categories = Category::paginate(5);
            return view(
                'admin.categories.index',
                [
                    'categories' => $categories
                ]
            );
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
            return view('admin.categories.create');
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
    public function store(StoreCategoryRequest $request)
    {
        $role_id = Auth::user()->role_id;
        if ($role_id == 0 || $role_id == 2) {
            $category_name = $request->input('category_name');
            $description = $request->input('description');
            $data = [
                'category_name' => $category_name,
                'description' => $description
            ];
            Category::create($data);
            Alert::success('Add successfully');
            return redirect()->route('category.index')->with('success', "Category has been create successfully");
        } else {
            return redirect("/");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $role_id = Auth::user()->role_id;
        if ($role_id == 0 || $role_id == 2) {
            return view('admin.categories.edit', compact('category'));
        } else {
            return redirect("/");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $role_id = Auth::user()->role_id;
        if ($role_id == 0 || $role_id == 2) {
            $category_name = $request->input('category_name');
            $description = $request->input('description');
            $data = [
                'category_name' => $category_name,
                'description' => $description
            ];
            $category->fill([
                'category_name' => $category_name,
                'description' => $description
            ])->save();
            Alert::success('Update successfully');
            return redirect()->route('category.index')->with('success', "Category update successfully");
        } else {
            return redirect("/");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $role_id = Auth::user()->role_id;
        if ($role_id == 0 || $role_id == 2) {
            $productsCount = Product::where('category_id', $category->id)->count();
            if ($productsCount > 0) {
                Alert::error('Delete Failed', "Can't delete because there are affiliate products");
                return redirect()->route('category.index');
            }
            $category->forceDelete();
            Alert::success('Delete successfully');
            return redirect()->route('category.index');
        } else {
            return redirect("/");
        }
    }
}
