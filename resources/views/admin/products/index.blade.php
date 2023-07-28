@extends('layouts.admin')
@section('content')
<div class="bg-secondary rounded h-100 p-4">
    <div class="pull-left">
        <h2>List Products</h2>
    </div>
    <div class="pull-right mb-2">
        <a class="btn btn-success" href="{{ route('product.create') }}"> New Product</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <td></td>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Brand</th>
                <th scope="col">Image</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($products as $product) {
            ?>
                <tr>
                    <td> <input type="checkbox" name="selectedIds[]" value="{{ $product->id }}"></td>
                    <td scope="row">{{$product->id}}</td>
                    <td>{{$product->product_name}}</td>
                    <td scope="row">{{$product->category->category_name}}</td>
                    <td scope="row">{{$product->brand->brand_name}}</td>
                    <td scope="row"><img src="{{asset('storage/image/'.$product->image)}}" alt="" height="50px" width="50px"></td>
                    <td scope="row">{{number_format($product->price, '0', ',', '.')}}</td>
                    <td class="row">
                        <form action="{{ route('product.destroy',$product->id) }}" method="Post" id="deleteForm-{{$formId = $product->id}}">
                            <a class="btn btn-link col" href="{{ route('product.edit',$product->id) }}"><i class="bi bi-pencil-square">Edit</i></a>
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-link btn-delete" data-form-id="{{ $formId }}"><i class="bi bi-trash">Delete</i></button>

                        </form>
                    </td>
                </tr>
            <?php } ?>
            <tr>
                <td> <input type="checkbox" id="select-all-checkbox" name="selectedIds[]" value="{{ $product->id }}"></td>
                <td colspan="2"> <button type="button" class="btn btn-danger btn-delete-multiple" data-route="{{ route('product.deleteMultiple') }}">Delete Selected</button></td>
            </tr>
        </tbody>
    </table>

    {{ $products->onEachSide(1)->links("pagination::bootstrap-4") }}
</div>

@endsection