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
                    <form action="#">
                        <div class="checkout__content--step section__contact--information">
                            <div class="customer__information">
                                <div class="checkout__email--phone mb-12">
                                    <label>
                                        <input class="checkout__input--field border-radius-5" placeholder="Email or mobile phone mumber" type="text">
                                    </label>
                                </div>
                                <div class="checkout__checkbox">
                                    <input class="checkout__checkbox--input" id="check1" type="checkbox">
                                    <span class="checkout__checkbox--checkmark"></span>
                                    <label class="checkout__checkbox--label" for="check1">
                                        Email me with news and offers</label>
                                </div>
                            </div>
                        </div>
                        <div class="checkout__content--step section__shipping--address">
                            <div class="section__header mb-25">
                                <h3 class="section__header--title">Shipping address</h3>
                            </div>
                            <div class="section__shipping--address__content">
                                <div class="row">
                                    <div class="col-lg-6 mb-12">
                                        <div class="checkout__input--list ">
                                            <label>
                                                <input class="checkout__input--field border-radius-5" placeholder="First name (optional)" type="text">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-12">
                                        <div class="checkout__input--list">
                                            <label>
                                                <input class="checkout__input--field border-radius-5" placeholder="Last name" type="text">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-12">
                                        <div class="checkout__input--list">
                                            <label>
                                                <input class="checkout__input--field border-radius-5" placeholder="Company (optional)" type="text">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-12">
                                        <div class="checkout__input--list">
                                            <label>
                                                <input class="checkout__input--field border-radius-5" placeholder="Address1" type="text">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-12">
                                        <div class="checkout__input--list">
                                            <label>
                                                <input class="checkout__input--field border-radius-5" placeholder="Apartment, suite, etc. (optional)" type="text">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-12">
                                        <div class="checkout__input--list">
                                            <label>
                                                <input class="checkout__input--field border-radius-5" placeholder="City" type="text">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-12">
                                        <div class="checkout__input--list checkout__input--select select">
                                            <label class="checkout__select--label" for="country">Country/region</label>
                                            <select class="checkout__input--select__field border-radius-5" id="country">
                                                <option value="1">India</option>
                                                <option value="2">United States</option>
                                                <option value="3">Netherlands</option>
                                                <option value="4">Afghanistan</option>
                                                <option value="5">Islands</option>
                                                <option value="6">Albania</option>
                                                <option value="7">Antigua Barbuda</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-12">
                                        <div class="checkout__input--list">
                                            <label>
                                                <input class="checkout__input--field border-radius-5" placeholder="Postal code" type="text">
                                            </label>
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
                        <div class="checkout__content--step__footer d-flex align-items-center">
                            <a class="continue__shipping--btn primary__btn border-radius-5" href="/bill">Continue To Shipping</a>
                            <a class="previous__link--content" href="/viewcart">Return to cart</a>
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