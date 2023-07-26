@extends('layouts.admin')
@section('content')
<div class="bg-secondary rounded h-100 p-4">
    <h6 class="mb-4">Add Category</h6>
    <form action="{{ route('category.store') }}" method="post" id="addCategoryForm">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">ID</label>
            <input type="text" class="form-control" disabled style="background-color: gray;" placeholder="///">
        </div>
        <div class="mb-3">
            <label class="form-label">Category_Name</label>
            <input type="text" class="form-control" name="category_name">
            @error('category_name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" id="" cols="30" rows="2" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>
@endsection
@section('scripts')
<script>
    document.getElementById('addCategoryForm').addEventListener('submit', function(e) {
        e.preventDefault();
        handleFormSubmit('addCategoryForm');
    });
</script>

@endsection