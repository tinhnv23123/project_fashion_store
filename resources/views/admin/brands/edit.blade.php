@extends('layouts.admin')
@section('content')
<div class="bg-secondary rounded h-100 p-4">
    <h6 class="mb-4">Edit Brand</h6>
    <form action="{{ route('brand.update', $brand->id) }}" method="post">
        @csrf
        @method ('PUT')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">ID</label>
            <input type="text" class="form-control" disabled style="background-color: gray;" placeholder="///">
        </div>
        <div class="mb-3">
            <label class="form-label">Brand_Name</label>
            <input type="text" class="form-control" name="brand_name" value ="{{$brand->brand_name}}">
            @error('category_name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" id="" cols="30" rows="2" class="form-control">{{$brand->description}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection