@extends('layouts.admin')
@section('content')
<div class="bg-secondary rounded h-100 p-4">
    <h6 class="mb-4">Floating Label</h6>
    <form action="{{route('user.update', $user->id)}}" method="post">
    @csrf
        @method ('PUT')
    <div class="form-floating mb-3">
        <select class="form-select" name="role_id" aria-label="Floating label select example">
            @if($user->role->role_name)
            <option selected value="{{ $user->role_id }}">{{ $user->role->role_name }}</option>
            @foreach ($roles as $role)
            <option value="{{ $role->id }}">{{ $role->role_name }}</option>
            @endforeach
            @else
            @foreach ($roles as $role)
            <option value="{{ $role->id }}">{{ $role->role_name }}</option>
            @endforeach
            @endif
        </select>
        <label for="floatingSelect">Thay đổi quyền người dùng</label>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection