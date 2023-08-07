@extends('layouts.client')
@section('content')
<div class="checkout__page--are">
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <h2 class="cart__title mb-40">Check Out</h2>
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
                                        <span class="breadcrumb__text current">Information</span>
                                        <svg class="readcrumb__chevron-icon" xmlns="http://www.w3.org/2000/svg" width="17.007" height="16.831" viewBox="0 0 512 512">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M184 112l144 144-144 144"></path>
                                        </svg>
                                    </li>
                                    <li class="breadcrumb__item breadcrumb__item--blank d-flex align-items-center">
                                        <span class="breadcrumb__text">Shipping</span>
                                        <svg class="readcrumb__chevron-icon" xmlns="http://www.w3.org/2000/svg" width="17.007" height="16.831" viewBox="0 0 512 512">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M184 112l144 144-144 144"></path>
                                        </svg>
                                    </li>
                                    <li class="breadcrumb__item breadcrumb__item--blank">
                                        <span class="breadcrumb__text">Payment</span>
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
                <h2 class="cart__title mb-40">Check Out</h2>
                <main class="main__content_wrapper">
                    <form action="{{ route('checkout.shipping') }}" method="post">
                        @csrf
                        <div class="checkout__content--step section__contact--information">
                            <!-- Trong file checkout.blade.php -->
                            <!-- ... -->
                            <div class="customer__information">
                                <div class="checkout__email--phone mb-12">
                                    <label>
                                        <input class="checkout__input--field border-radius-5" placeholder="Email" type="text" name="email" value="{{ $user->email ?? old('email') }}">
                                    </label>
                                </div>
                                <div class="checkout__checkbox">
                                    <input class="checkout__checkbox--input" id="check1" type="checkbox">
                                    <span class="checkout__checkbox--checkmark"></span>
                                    <label class="checkout__checkbox--label" for="check1">
                                        Email me with news and offers</label>
                                </div>
                            </div>
                            <div class="checkout__content--step section__shipping--address">
                                <div class="section__header mb-25">
                                    <h3 class="section__header--title">Shipping address</h3>
                                </div>
                                <div class="section__shipping--address__content">
                                    <div class="row">
                                        <div class="col-lg-12 mb-12">
                                            <div class="checkout__input--list">
                                                <label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="Name" type="text" name="name" value="{{ $user->name ?? old('name') }}">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-12">
                                            <div class="checkout__input--list">
                                                <label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="Address" type="text" name="address" value="{{ $user->address ?? old('address') }}">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-12">
                                            <div class="checkout__input--list">
                                                <label>
                                                    <input class="checkout__input--field border-radius-5" placeholder="Phone number" type="text" name="phone" value="{{ $user->phone ?? old('phone') }}">
                                                </label>
                                            </div>
                                            <div class="checkout__content--input__box--wrapper" id="form2" style="display: none;">
                                                <div class="row">
                                                    <div class="col-12 mb-12">
                                                        <div class="checkout__input--list position__relative">
                                                            <label>
                                                                <input class="checkout__input--field border-radius-5" placeholder="Card number" type="text">
                                                            </label>
                                                            <button class="checkout__input--field__button" type="button">

                                                                <svg xmlns="http://www.w3.org/2000/svg" width="15.51" height="15.443" viewBox="0 0 512 512">
                                                                    <path d="M336 208v-95a80 80 0 00-160 0v95" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
                                                                    <rect x="96" y="208" width="320" height="272" rx="48" ry="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-12">
                                                        <div class="checkout__input--list">
                                                            <label>
                                                                <input class="checkout__input--field border-radius-5" placeholder="Name on card" type="text">
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-12">
                                                        <div class="checkout__input--list">
                                                            <label>
                                                                <input class="checkout__input--field border-radius-5" placeholder="piration date (MM / YY)" type="text">
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-12">
                                                        <div class="checkout__input--list position__relative">
                                                            <label>
                                                                <input class="checkout__input--field border-radius-5" placeholder="Security code" type="text">
                                                            </label>
                                                            <button class="checkout__input--field__button" type="button">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="18.51" height="18.443" viewBox="0 0 512 512">
                                                                    <title>Help Circle</title>
                                                                    <path d="M256 80a176 176 0 10176 176A176 176 0 00256 80z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
                                                                    <path d="M200 202.29s.84-17.5 19.57-32.57C230.68 160.77 244 158.18 256 158c10.93-.14 20.69 1.67 26.53 4.45 10 4.76 29.47 16.38 29.47 41.09 0 26-17 37.81-36.37 50.8S251 281.43 251 296" fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="28" />
                                                                    <circle cx="250" cy="348" r="20" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="checkout__checkbox">
                                            <input class="checkout__checkbox--input" id="check2" type="checkbox">
                                            <span class="checkout__checkbox--checkmark"></span>
                                            <label class="checkout__checkbox--label" for="check2">
                                                Save this information for next time</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- ... -->
                                <div class="d-flex">
                                    <div class="checkout__content--step__footer d-flex align-items-center mt-5">
                                        <button type="submit" class="continue__shipping--btn primary__btn border-radius-5">Continue To Shipping
                                    </div>

                                    <div class="checkout__content--step__footer d-flex align-items-center mt-5">
                                        <a class="previous__link--content" href="/viewcart">Return to cart</a>
                                    </div>

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