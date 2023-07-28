@extends('layouts.admin')
@section('content')
<div class="bg-secondary rounded h-100 p-4">
    <h6 class="mb-4">Edit Product</h6>
    <form action="{{route('product.update', $product->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method ('PUT')
        <div class="mb-3">
            <label class="form-label">ID</label>
            <input type="text" class="form-control" disabled style="background-color: gray;" placeholder="///">
        </div>
        <div class="mb-3">
            <label class="form-label">Product_Name</label>
            <input type="text" class="form-control" name="product_name" class="@error('product_name') is-invalid @enderror" value="{{$product->product_name}}">
            @error('product_name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <!--Categories -->
        <div class="mb-3">
            <label class="form-label">Category</label>
            <select class="form-select" aria-label="Floating label select example" name="category_id">
                        @if($product->category->category_name)
                        <option selected value="{{ $product->category_id }}">{{ $product->category->category_name }}</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                        @else
                        <option>Không có</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                        @endif
            </select>
        </div>
        <!-- Brand -->
        <div class="mb-3">
            <label class="form-label">Brand</label>
            <select class="form-select" aria-label="Floating label select example" name="brand_id">
                        @if($product->brand->brand_name)
                        <option selected value="{{ $product->brand_id }}">{{ $product->brand->brand_name }}</option>
                        @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                        @endforeach
                        @else
                        @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                        @endforeach
                        @endif
            </select>
        </div>
        <!--  -->
        <div class="mb-3">
            <label class="form-label">Image</label>
            <div><img src="{{asset('storage/image/'.$product->image)}}" alt="" height="50px" width="50px"></div>
            <input type="file" class="form-control bg-dark" name="image" class="@error('image') is-invalid @enderror">
            @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="text" class="form-control" name="price" class="@error('price') is-invalid @enderror" value="{{$product->price}}">
            @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Discount</label>
            <input type="text" class="form-control" name="discount_price"  value="{{$product->discount_price}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" cols="30" rows="5">
            {{$product->description}}
            </textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@endsection