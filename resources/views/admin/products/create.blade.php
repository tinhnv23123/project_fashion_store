@extends('layouts.admin')
@section('content')
<div class="bg-secondary rounded h-100 p-4">
    <h6 class="mb-4">Add Product</h6>
    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">ID</label>
            <input type="text" class="form-control" disabled style="background-color: gray;" placeholder="///">
        </div>
        <div class="mb-3">
            <label class="form-label">Product_Name</label>
            <input type="text" class="form-control" name="product_name" class="@error('product_name') is-invalid @enderror">
            @error('product_name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!--Categories -->
        <div class="mb-3">
            <label class="form-label">Category</label>
            <select class="form-select" aria-label="Floating label select example" name="category_id">
                <option selected value="">Select category</option>
                <?php
                foreach ($categories as $category) {
                ?>
                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Brand</label>
            <select class="form-select" aria-label="Floating label select example" name="brand_id">
                <option selected value="">Select_brand</option>
                <?php
                foreach ($brands as $brand) {
                ?>
                    <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                <?php
                }
                ?>
            </select>
        </div>
        <!--  -->
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" class="form-control bg-dark" name="image" class="@error('image') is-invalid @enderror">
            @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="text" class="form-control" name="price" class="@error('price') is-invalid @enderror">
            @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Discount</label>
            <input type="text" class="form-control" name="discount_price" >
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" cols="30" rows="5">
            </textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>
@endsection