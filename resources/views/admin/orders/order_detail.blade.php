@extends('layouts.admin')
@section('content')

<div class="bg-secondary rounded h-100 p-4">
    <div class="pull-left">
        <h2>Order Detail</h2>
    </div>

    <div class="col-sm-12 col-xl-8">
        <h6 class="mb-4">Order Detail ID {{$order->id}}</h6>
        <div class="bg-secondary rounded h-100 p-4 d-flex">
            <div class="col-9">
                <div class="row mb-3">
                    <label class="col-sm-3 ">Customer: </label>
                    <div class="col-sm-9">
                        <p>Name: {{$order->name}} </p>
                        <p>Email: {{$order->email}} </p>
                        <p>Phone: {{$order->phone}}</p>
                        <p>Address: {{$order->address}}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3">Products: </label>
                    <div class="col-sm-9">
                        <p>Name: {{$order->product_name}} </p>
                        <p>Total: {{number_format($order->total, '0', ',', '.')}} VNĐ </p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-3 ">Pay Method: </label>
                    <div class="col-sm-9">
                        <p>{{$order->pay_method}}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-3 ">Status: </label>
                    <div class="col-sm-9">
                        <p>{{$order->delivery_status}}</p>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <?php $grandtotal = 0; ?>
                @foreach ($products as $product)
                <div class="row mb-3">
                    <label class="col-sm-3 "><img src="{{asset('storage/image/'.$product['image'])}}" alt="" width="90px"> </label>
                    <div class="col-sm-9">
                        <p>Product_name: {{$product['product_name']}} </p>
                        <p>Qty: {{$product['quantity']}} </p>
                        <p>Total price: {{number_format($product['quantity'] * $product['price'], '0', ',', '.')}} VNĐ </p>
                    </div>
                </div>

                <?php
                $grandtotal += ($product['quantity'] * $product['price']);
                ?>
                @endforeach
                <div class="row mb-3">
                    <label class="col-sm-3 ">Total: </label>
                    <div class="col-sm-9">
                        <td class="checkout__total--footer__amount checkout__total--footer__list text-right">{{number_format($grandtotal, '0', ',', '.')}} VNĐ</td>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection