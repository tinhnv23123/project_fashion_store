@extends('layouts.admin')
@section('content')

<div class="bg-secondary rounded h-100 p-4">
    <div class="pull-left">
        <h2>List Brands</h2>
    </div>
    <div class="pull-right mb-2">
        <a class="btn btn-success" href="{{ route('brand.create') }}"> New Brand</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Brand_Name</th>
                <th scope="col">Created_at</th>
                <th scope="col">Updated_at</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($brands as $brand) {
            ?>
                <tr>
                    <th scope="row">{{$brand->id}}</th>
                    <td>{{$brand->brand_name}}</td>
                    <td>{{$brand->created_at}}</td>
                    <td>{{$brand->updated_at}}</td>
                    <td class="row">
                        <form action="{{ route('brand.destroy',$brand->id) }}" method="Post"  id="deleteForm-{{$formId = $brand->id}}">
                            <a class="btn btn-link col" href="{{ route('brand.edit',$brand->id) }}"><i class="bi bi-pencil-square">Edit</i></a>
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-link btn-delete" data-form-id="{{ $formId }}"><i class="bi bi-trash">Delete</i></button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    {{$brands->onEachSide(1)->links("pagination::bootstrap-4")}}
</div>

@endsection