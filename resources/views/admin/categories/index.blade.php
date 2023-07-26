@extends('layouts.admin')
@section('content')

<div class="bg-secondary rounded h-100 p-4">
    <div class="pull-left">
        <h2>List Categories</h2>
    </div>
    <div class="pull-right mb-2">
        <a class="btn btn-success" href="{{ route('category.create') }}"> New Category</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Category_Name</th>
                <th scope="col">Created_at</th>
                <th scope="col">Updated_at</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($categories as $category) {
            ?>
                <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td>{{$category->category_name}}</td>
                    <td>{{$category->created_at}}</td>
                    <td>{{$category->updated_at}}</td>
                    <td class="row">
                        <form action="{{ route('category.destroy',$category->id) }}" method="Post" id="deleteForm-{{$formId = $category->id}}">
                            <a class="btn btn-link col" href="{{ route('category.edit',$category->id) }}"><i class="bi bi-pencil-square">Edit</i></a>
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-link btn-delete" data-form-id="{{ $formId }}"><i class="bi bi-trash">Delete</i></button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    {{$categories->onEachSide(1)->links("pagination::bootstrap-4")}}
</div>

@endsection