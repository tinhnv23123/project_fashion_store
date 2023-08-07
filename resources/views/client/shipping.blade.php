@extends('layouts.client')
@section('content')
<div class="checkout__page--are">
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <h2 class="cart__title mb-40">Shipping</h2>
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <nav>
                                <ol class="breadcrumb checkout__breadcrumb d-flex">
                                    <li class="breadcrumb__item breadcrumb__item--completed d-flex align-items-center">
                                        <a class="breadcrumb__link" href="cart.html">Cart</a>
                                        <svg class="readcrumb__chevron-icon" xmlns="http://www.w3.org/2000/svg" width="17.007" height="16.831" viewBox="0 0 512 512">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M184 112l144 144-144 144"></path>
                                        </svg>
                                    </li>
                                    <li class="breadcrumb__item breadcrumb__item--current d-flex align-items-center">
                                        <a class="breadcrumb__link" href="cart.html">Information</a>
                                        <svg class="readcrumb__chevron-icon" xmlns="http://www.w3.org/2000/svg" width="17.007" height="16.831" viewBox="0 0 512 512">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M184 112l144 144-144 144"></path>
                                        </svg>
                                    </li>
                                    <li class="breadcrumb__item breadcrumb__item--blank d-flex align-items-center">
                                        <a class="breadcrumb__link" href="cart.html">Shipping</a>
                                        <svg class="readcrumb__chevron-icon" xmlns="http://www.w3.org/2000/svg" width="17.007" height="16.831" viewBox="0 0 512 512">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M184 112l144 144-144 144"></path>
                                        </svg>
                                    </li>
                                    <li class="breadcrumb__item breadcrumb__item--blank">
                                        <span class="breadcrumb__text current">Payment</span>
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
        <div class="checkout__page--inner d-flex">
            <div class="main checkout__mian">
                <h2 class="cart__title mb-40">Confirm Infomation</h2>
                <main class="main__content_wrapper">
                    <form action="{{ route('order.shipping') }}" method="post">
                        <div class="checkout__content--step checkout__contact--information2 border-radius-5 mb-10">
                            <div class="checkout__review d-flex justify-content-between align-items-center">
                                <div class="checkout__review--inner d-flex align-items-center">
                                    <label class="checkout__review--label">Contact</label>
                                    <span class="checkout__review--content"> {{ $shippingInfo['email'] ?? '' }}</span>
                                </div>
                            </div>
                            <div class="checkout__review d-flex justify-content-between align-items-center">
                                <div class="checkout__review--inner d-flex align-items-center">
                                    <label class="checkout__review--label">Name</label>
                                    <span class="checkout__review--content">{{ $shippingInfo['name'] ?? '' }}</span>
                                </div>
                            </div>
                            <div class="checkout__review d-flex justify-content-between align-items-center">
                                <div class="checkout__review--inner d-flex align-items-center">
                                    <label class="checkout__review--label"> Ship to</label>
                                    <span class="checkout__review--content">{{ $shippingInfo['address'] ?? '' }}</span>
                                </div>
                            </div>
                            <div class="checkout__review d-flex justify-content-between align-items-center">
                                <div class="checkout__review--inner d-flex align-items-center">
                                    <label class="checkout__review--label">Phone number</label>
                                    <span class="checkout__review--content">{{ $shippingInfo['phone'] ?? '' }} </span>
                                </div>
                            </div>

                            <a class="previous__link--content" href="/checkout">Change Infomation</a>
                        </div>
                        <div class="checkout__content--step__footer d-flex align-items-center">
                            <div>
                                <a class="continue__shipping--btn primary__btn border-radius-5 mb-10" href="{{url('/order')}}">Continute Payment on delivery</a> -->
                            </div>
                            <a class="previous__link--content" href="/checkout">Return to checkout</a>

                        </div>
                    </form>
                </main>
                <footer class="main__footer checkout__footer">
                </footer>
            </div>
            <aside class="checkout__sidebar sidebar ">
                <div class="cart__table checkout__product--table">
                    <table class="cart__table--inner">
                        <tbody class="cart__table--body">
                            <?php $grandtotal = 0; ?>
                            @foreach($carts as $cart)
                            <tr class="cart__table--body__items">
                                <td class="cart__table--body__list">
                                    <div class="product__image two  d-flex align-items-center">
                                        <div class="product__thumbnail border-radius-5">
                                            <a href="product-details.html"><img class="border-radius-5" src="{{asset('storage/image/'.$cart->image)}}" alt="cart-product"></a>
                                            <span class="product__thumbnail--quantity">{{$cart->quantity}}</span>
                                        </div>
                                        <div class="product__description">
                                            <h3 class="product__description--name h4"><a href="product-details.html">{{$cart->product_name}}</a></h3>
                                            <!-- <span class="product__description--variant">COLOR: Blue</span> -->
                                        </div>
                                    </div>
                                </td>
                                <td class="cart__table--body__list">
                                    <span class="cart__price">{{number_format($cart->total, '0', ',', '.')}} VNĐ</span>
                                </td>
                            </tr>
                            <?php $grandtotal = $grandtotal + $cart->total ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="checkout__total">
                    <table class="checkout__total--table">
                        <tbody class="checkout__total--body">
                            <tr class="checkout__total--items">
                                <td class="checkout__total--title text-left">Subtotal </td>
                                <td class="checkout__total--amount text-right">0</td>
                            </tr>
                            <tr class="checkout__total--items">
                                <td class="checkout__total--title text-left">Shipping</td>
                                <td class="checkout__total--calculated__text text-right">Calculated at next step</td>
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
            </aside>
        </div>
    </div>
</div>
@endsection