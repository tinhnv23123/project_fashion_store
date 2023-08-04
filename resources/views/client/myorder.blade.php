@extends('layouts.client')
@section('content')
<main class="main__content_wrapper">

    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <h1 class="breadcrumb__content--title text-white mb-25">Orders</h1>
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items"><a class="text-white" href="/">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span class="text-white">Orders</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->

    <!-- my account section start -->
    <section class="my__account--section section--padding">
        <div class="container">
            <div class="my__account--section__inner">

                <div class="account__wrapper account__wrapper--style4 border-radius-10">
                    <div class="account__content">
                        <h2 class="account__content--title h3 mb-20">Orders History</h2>
                        <div class="checkout__content--step__footer d-flex align-items-center mt-5">
                            <a class="continue__shipping--btn primary__btn border-radius-5 mb-5" href="{{url('/products')}}">Shopping now</a>
                        </div>
                        <div class="account__table--area">
                            <table class="account__table">
                                <thead class="account__table--header">
                                    <tr class="account__table--header__child">
                                        <th class="account__table--header__child--items">Order</th>
                                        <th class="account__table--header__child--items">Date</th>
                                        <th class="account__table--header__child--items">Status</th>
                                        <th class="account__table--header__child--items">Total</th>
                                        <th class="account__table--header__child--items">Order Detail</th>
                                    </tr>
                                </thead>
                                @foreach($orders as $count => $order)
                                <tbody class="account__table--body mobile__none">
                                    <tr class="account__table--body__child">
                                        <td class="account__table--body__child--items">#{{count($orders) - $count}}</td>
                                        <td class="account__table--body__child--items">{{$order->created_at->format('M d, Y - H:i:s')}}</td>
                                        <td class="account__table--body__child--items">{{$order->delivery_status}}</td>
                                        <td class="account__table--body__child--items">{{number_format($order->total, '0', ',', '.')}} VNĐ</td>
                                        <td class="account__table--body__child--items"><a class="btn btn-success" href="{{route('order.detail',['orderId' => $order->id]) }}">Order Detail</a></td>
                                    </tr>
                                </tbody>
                                @endforeach
                                <!-- responsive -->
                                <tbody class="account__table--body mobile__block">
                                    @foreach($orders as $count => $order)
                                    <tr class="account__table--body__child">
                                        <td class="account__table--body__child--items">
                                            <strong>Order</strong>
                                            <span>#{{count($orders) - $count}}</span>
                                        </td>
                                        <td class="account__table--body__child--items">
                                            <strong>Date</strong>
                                            <span>{{$order->created_at->format('M d, Y - H:i:s')}}</span>
                                        </td>
                                        <td class="account__table--body__child--items">
                                            <strong>Status</strong>
                                            <span>{{$order->delivery_status}}</span>
                                        </td>
                                        <td class="account__table--body__child--items">
                                            <strong>Total</strong>
                                            <span>{{number_format($order->total, '0', ',', '.')}} VNĐ</span>
                                        </td>
                                        <td class="account__table--body__child--items"><a class="btn btn-success" href="{{route('order.detail',['orderId' => $order->id]) }}">Order Detail</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- my account section end -->

    <!-- Start shipping section -->
    <section class="shipping__section2 shipping__style3 section--padding pt-0">
        <div class="container">
            <div class="shipping__section2--inner shipping__style3--inner d-flex justify-content-between">
                <div class="shipping__items2 d-flex align-items-center">
                    <div class="shipping__items2--icon">
                        <img src="assets/img/other/shipping1.png" alt="">
                    </div>
                    <div class="shipping__items2--content">
                        <h2 class="shipping__items2--content__title h3">Shipping</h2>
                        <p class="shipping__items2--content__desc">From handpicked sellers</p>
                    </div>
                </div>
                <div class="shipping__items2 d-flex align-items-center">
                    <div class="shipping__items2--icon">
                        <img src="assets/img/other/shipping2.png" alt="">
                    </div>
                    <div class="shipping__items2--content">
                        <h2 class="shipping__items2--content__title h3">Payment</h2>
                        <p class="shipping__items2--content__desc">From handpicked sellers</p>
                    </div>
                </div>
                <div class="shipping__items2 d-flex align-items-center">
                    <div class="shipping__items2--icon">
                        <img src="assets/img/other/shipping3.png" alt="">
                    </div>
                    <div class="shipping__items2--content">
                        <h2 class="shipping__items2--content__title h3">Return</h2>
                        <p class="shipping__items2--content__desc">From handpicked sellers</p>
                    </div>
                </div>
                <div class="shipping__items2 d-flex align-items-center">
                    <div class="shipping__items2--icon">
                        <img src="assets/img/other/shipping4.png" alt="">
                    </div>
                    <div class="shipping__items2--content">
                        <h2 class="shipping__items2--content__title h3">Support</h2>
                        <p class="shipping__items2--content__desc">From handpicked sellers</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End shipping section -->

</main>
@endsection