@extends('layouts.admin')
@section('content')

<div class="bg-secondary rounded h-100 p-4">
    <div class="pull-left">
        <h2>List Order</h2>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Create_at</th>
                <th scope="col">Email</th>
                <th scope="col">Total</th>
                <th scope="col">Pay Method</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <th scope="row">{{$order->id}}</th>
                <td scope="row">{{$order->created_at->format('M d, Y - H:i:s')}}</td>
                <td scope="row">{{$order->email}}</td>
                <td scope="row">{{number_format($order->total, '0', ',', '.')}} VNĐ</td>
                <td scope="row">{{$order->pay_method}}</td>
                @if($order->delivery_status == 'Pending')
                <td scope="row"><a href="{{url('delivered', $order->id)}}" class="btn btn-success">{{$order->delivery_status}}</a></td>

                @else
                <td scope="row" class="text-success">{{$order->delivery_status}}</td>
                @endif
                <td scope="row">
                    <a href="{{route('admin.orderdetail', [$order->id]) }}">Order Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection