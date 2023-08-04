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
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <th scope="row">{{$order->id}}</th>
                <td>{{$order->created_at->format('M d, Y - H:i:s')}}</td>
                <td>{{$order->email}}</td>
                <td>{{number_format($order->total, '0', ',', '.')}} VNĐ</td>
                <td>{{$order->pay_method}}</td>
                <td>{{$order->delivery_status}}</td>
                <td class="row">
                    <a href="{{route('admin.orderdetail', [$order->id]) }}">Order Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection