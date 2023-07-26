@extends('layouts.admin')
@section('content')

<div class="bg-secondary rounded h-100 p-4">
    <div class="pull-left">
        <h2>List Users</h2>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Role</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Phone</th>
                <th scope="col">Created_at</th>
                <th scope="col">Updated_at</th>
                @if(Auth::user()->role_id == 0)
                <th scope="col">Action</th>
                @endif
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($users as $user) {
            ?>
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->role->role_name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->address}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->updated_at}}</td>

                    @if(Auth::user()->role_id == 0)
                    <td class="row">
                        <a class="btn btn-link col" href="{{ route('user.edit',$user->id) }}"><i class="bi bi-pencil-square">Edit</i></a>
                    </td>
                    @endif
                </tr>
            <?php } ?>
        </tbody>
    </table>
    {{$users->onEachSide(1)->links("pagination::bootstrap-4")}}
</div>

@endsection