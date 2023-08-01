@extends('layouts.client')
@section('content')
<div class="checkout__page--are">
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <h2 class="cart__title mb-40">Bill</h2>
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <nav>
                                <ol class="breadcrumb checkout__breadcrumb d-flex">
                                    <li class="breadcrumb__item breadcrumb__item--completed d-flex align-items-center">
                                        <a class="breadcrumb__link" href="/viewcart">Cart</a>
                                        <svg class="readcrumb__chevron-icon" xmlns="http://www.w3.org/2000/svg" width="17.007" height="16.831" viewBox="0 0 512 512">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M184 112l144 144-144 144"></path>
                                        </svg>
                                    </li>
                                    <li class="breadcrumb__item breadcrumb__item--current d-flex align-items-center">
                                        <a class="breadcrumb__link" href="/checkout">Information</a>
                                        <svg class="readcrumb__chevron-icon" xmlns="http://www.w3.org/2000/svg" width="17.007" height="16.831" viewBox="0 0 512 512">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M184 112l144 144-144 144"></path>
                                        </svg>
                                    </li>
                                    <li class="breadcrumb__item breadcrumb__item--blank d-flex align-items-center">
                                        <a class="breadcrumb__link" href="/shipping">Shipping</a>
                                        <svg class="readcrumb__chevron-icon" xmlns="http://www.w3.org/2000/svg" width="17.007" height="16.831" viewBox="0 0 512 512">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M184 112l144 144-144 144"></path>
                                        </svg>
                                    </li>
                                    <li class="breadcrumb__item breadcrumb__item--blank">
                                    <a class="breadcrumb__link" href="/bill">Bill</a>
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
                <h2 class="cart__title mb-40">Shipping address</h2>
                <main class="main__content_wrapper">
                        <form action="#">
                            <div class="checkout__content--step section__shipping--address pt-0">
                                <div class="section__header checkout__header--style3 position__relative mb-25">
                                    <span class="checkout__order--number">Order #0021</span>
                                    <h2 class="section__header--title h3">Thank you submission</h2>
                                    <div class="checkout__submission--icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25.995" height="25.979" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M416 128L192 384l-96-96"/></svg>
                                    </div>
                                </div>
                                <div class="order__confirmed--area border-radius-5 mb-15">
                                    <h3 class="order__confirmed--title h4">Your order is confirmed</h3>
                                    <p class="order__confirmed--desc">You,ll receive a confirmation email with your order number shortly</p>
                                </div>
                                <div class="customer__information--area border-radius-5">
                                    <h3 class="customer__information--title h4">Customer Information</h3>
                                    <div class="customer__information--inner d-flex">
                                        <div class="customer__information--list">
                                            <div class="customer__information--step">
                                                <h4 class="customer__information--subtitle h5">Contact information</h4>
                                                <ul>
                                                    <li><a class="customer__information--text__link" href="#">info42@gmail.com</a></li>
                                                </ul>
                                            </div>
                                            <div class="customer__information--step">
                                                <h4 class="customer__information--subtitle h5">Shipping address</h4>
                                                <ul>
                                                    <li><span class="customer__information--text">Amin</span></li>
                                                    <li><span class="customer__information--text">Rajging</span></li>
                                                    <li><span class="customer__information--text">Dhaka 12119</span></li>
                                                    <li><span class="customer__information--text">Bangladesh</span></li>
                                                </ul>
                                            </div>
                                            <div class="customer__information--step">
                                                <h4 class="customer__information--subtitle h5">Shipping method</h4>
                                                <ul>
                                                    <li><span class="customer__information--text">Amin</span></li>
                                                    <li><span class="customer__information--text">Rajging</span></li>
                                                    <li><span class="customer__information--text">Dhaka 12119</span></li>
                                                    <li><span class="customer__information--text">Bangladesh</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="customer__information--list">
                                            <div class="customer__information--step">
                                                <h4 class="customer__information--subtitle h5">Payment method</h4>
                                                <ul>
                                                    <li><span class="customer__information--text">ending With</span></li>
                                                </ul>
                                            </div>
                                            <div class="customer__information--step">
                                                <h4 class="customer__information--subtitle h5">Shipping method</h4>
                                                <ul>
                                                    <li><span class="customer__information--text">Amin</span></li>
                                                    <li><span class="customer__information--text">Rajging</span></li>
                                                    <li><span class="customer__information--text">Dhaka 12119</span></li>
                                                    <li><span class="customer__information--text">Bangladesh</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__content--step__footer d-flex align-items-center">
                                <a class="continue__shipping--btn primary__btn border-radius-5" href="!#">My order</a>
                                <a class="previous__link--content" href="/shipping">Return to shipping</a>
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
                <div class="checkout__discount--code">
                    <form class="d-flex" action="#">
                        <label>
                            <input class="checkout__discount--code__input--field border-radius-5" placeholder="Gift card or discount code" type="text">
                        </label>
                        <button class="checkout__discount--code__btn primary__btn border-radius-5" type="submit">Apply</button>
                    </form>
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