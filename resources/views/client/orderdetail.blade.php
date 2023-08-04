@extends('layouts.client')
@section('content')
<div class="checkout__page--are">
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <h2 class="cart__title mb-40">Order Detail</h2>
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <nav>
                                <ol class="breadcrumb checkout__breadcrumb d-flex">
                                    <li class="breadcrumb__item breadcrumb__item--completed d-flex align-items-center">
                                        <a class="breadcrumb__link" href="/viewcart">Order</a>
                                        <svg class="readcrumb__chevron-icon" xmlns="http://www.w3.org/2000/svg" width="17.007" height="16.831" viewBox="0 0 512 512">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M184 112l144 144-144 144"></path>
                                        </svg>
                                    </li>
                                    <li class="breadcrumb__item breadcrumb__item--current d-flex align-items-center">
                                        <a class="breadcrumb__link" href="/checkout">Order Detail</a>
                                    </li>
                                </ol>
                            </nav>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container  section--padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="alert alert-success text-center mt-5" role="alert">
                        <h4 class="alert-heading">Order Detail!</h4>
                    </div>
                </div>
            </div>

            <div class="checkout__page--inner d-flex">
                <div class="main checkout__mian">
                    <main class="main__content_wrapper">
                        <form action="#">
                            <div class="checkout__content--step section__shipping--address pt-0">
                                <div class="customer__information--area border-radius-5">
                                    <h3 class="customer__information--title h4">Customer Information</h3>
                                    <div class="customer__information--inner d-flex">
                                        <div class="customer__information--list">
                                            <div class="customer__information--step">
                                                <h4 class="customer__information--subtitle h5">Contact information</h4>
                                                <ul>
                                                    <li><a class="customer__information--text__link" href="#">Customer: {{ $order->name }}</a></li>
                                                    <li><a class="customer__information--text__link" href="#">Email: {{ $order->email }}</a></li>
                                                    <li><a class="customer__information--text__link" href="#">Phone: {{ $order->phone }}</a></li>
                                                </ul>
                                            </div>
                                            <div class="customer__information--step">
                                                <h4 class="customer__information--subtitle h5">Shipping address</h4>
                                                <ul>
                                                    <li><span class="customer__information--text">{{ $order->address }}</span></li>
                                                </ul>
                                            </div>
                                            <div class="customer__information--step">
                                                <h4 class="customer__information--subtitle h5">Shipping method</h4>
                                                <ul>
                                                    <li><span class="customer__information--text">{{ $order->pay_method }}</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="customer__information--list">
                                            <div class="customer__information--step">
                                                <h4 class="customer__information--subtitle h5">Products Name</h4>
                                                <ul>
                                                    <li><span class="customer__information--text">Products: {{ $order->product_name }}</span></li>
                                                </ul>
                                                <ul>
                                                    <li><span class="customer__information--text">Total: {{number_format($order->total, '0', ',', '.')}} VNĐ</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="checkout__content--step__footer d-flex align-items-center mt-5">
                                    <a class="continue__shipping--btn primary__btn border-radius-5" href="{{url('myorder')}}">My order</a>
                                </div>
                            </div>
                        </form>
                    </main>
                    <footer class="main__footer checkout__footer">
                    </footer>
                </div>
                <aside class="checkout__sidebar sidebar my-10 ">
                    <div class="cart__table checkout__product--table">
                        <?php $grandtotal = 0; ?>
                        @foreach ($products as $product)
                        <table class="cart__table--inner">
                            <tbody class="cart__table--body">
                                <tr class="cart__table--body__items">
                                    <td class="cart__table--body__list">
                                        <div class="product__image two  d-flex align-items-center">
                                            <div class="product__thumbnail border-radius-5">
                                                <a href="product-details.html"><img class="border-radius-5" src="{{asset('storage/image/'.$product['image'])}}" alt="cart-product"></a>
                                                <span class="product__thumbnail--quantity">{{$product['quantity']}}</span>
                                            </div>
                                            <div class="product__description">
                                                <h3 class="product__description--name h4"><a href="product-details.html">{{$product['product_name']}}</a></h3>
                                                <!-- <span class="product__description--variant">COLOR: Blue</span> -->
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__table--body__list">
                                        <span class="cart__price">{{number_format($product['quantity'] * $product['price'], '0', ',', '.')}} VNĐ</span>
                                    </td>
                                </tr>
                                <?php
                                $grandtotal += ($product['quantity'] * $product['price']);
                                ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="checkout__total">
                        <div class="checkout__total">
                            <table class="checkout__total--table">
                                <tbody class="checkout__total--body">
                                    <tr class="checkout__total--items">
                                        <td class="checkout__total--title text-left">Surcharge </td>
                                        <td class="checkout__total--amount text-right">0</td>
                                    </tr>
                                </tbody>
                                <tfoot class="checkout__total--footer">
                                    <tr class="checkout__total--footer__items">
                                        <td class="checkout__total--footer__title checkout__total--footer__list text-left">Total </td>
                                        <td class="checkout__total--footer__amount checkout__total--footer__list text-right">{{number_format($grandtotal, '0', ',', '.')}} VNĐ</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
@endsection