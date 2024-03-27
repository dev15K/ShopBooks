@extends('ui.layouts.master')
@section('title')
    Checkout
@endsection
@section('content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{ route('home') }}">Home</a> <span class="mx-2 mb-0">/</span>
                    <a href="{{ route('cart.show') }}">Cart</a> <span class="mx-2 mb-0">/</span> <strong
                        class="text-black">Checkout</strong></div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12">
                    <div class="border p-4 rounded" role="alert">
                        Returning customer? <a href="{{ route('main.contact') }}">Click here</a>
                    </div>
                </div>
            </div>
            <form method="post" action="{{ route('checkout.create') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-5 mb-md-0">
                        <h2 class="h3 mb-3 text-black">Billing Details</h2>
                        <div class="p-3 p-lg-5 border">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="full_name" class="text-black">Full Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="full_name" name="full_name"
                                           value="{{ Auth::user()->full_name }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="c_address" class="text-black">Address <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_address" name="c_address"
                                           value="{{ Auth::user()->address }}"
                                           placeholder="Street address" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="d_address"
                                       placeholder="Apartment, suite, unit etc. (optional)" required
                                       value="{{ Auth::user()->address }}">
                            </div>

                            <div class="form-group row mb-5">
                                <div class="col-md-6">
                                    <label for="c_email_address" class="text-black">Email Address <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_email_address" name="c_email_address"
                                           value="{{ Auth::user()->email }}"
                                           required>
                                </div>
                                <div class="col-md-6">
                                    <label for="c_phone" class="text-black">Phone <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="c_phone" name="c_phone"
                                           placeholder="Phone Number" required value="{{ Auth::user()->phone }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="c_order_notes" class="text-black">Order Notes</label>
                                <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5"
                                          class="form-control"
                                          placeholder="Write your notes here..."></textarea>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row mb-5">
                            <div class="col-md-12">
                                <h2 class="h3 mb-3 text-black">Your Order</h2>
                                <div class="p-3 p-lg-5 border">
                                    <table class="table site-block-order-table mb-5">
                                        <thead>
                                        <th>Product</th>
                                        <th>Total</th>
                                        </thead>
                                        <tbody>
                                        @foreach($carts as $cart)
                                            <tr>
                                                <td>
                                                    {{ $cart->product->name }} <strong
                                                        class="mx-2">x</strong> {{ $cart->quantity }}
                                                    <p class="small text-danger">${{ $cart->product->price }}</p>
                                                </td>
                                                <td class="text-danger">
                                                    $
                                                    <span
                                                        class="productPrice">{{ $cart->product->price * $cart->quantity }}</span>
                                                </td>
                                            </tr>
                                        @endforeach

                                        <tr>
                                            <td class="text-black font-weight-bold"><strong>Cart Subtotal</strong></td>
                                            <td class="text-black">$
                                                <span id="cart_subtotal">0</span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="text-black font-weight-bold"><strong>Ship Fee</strong></td>
                                            <td class="text-black">$
                                                <span id="ship_fee">0</span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="text-black font-weight-bold"><strong>Discount Fee</strong></td>
                                            <td class="text-black">-$
                                                <span id="discount_fee">0</span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                                            <td class="text-black font-weight-bold">
                                                <strong>$
                                                    <span id="order_total">0</span>
                                                </strong>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <div class="border p-3 mb-3">
                                        <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse"
                                                               href="#collapsecheque"
                                                               role="button" aria-expanded="false"
                                                               aria-controls="collapsecheque">Cash on Delivery</a></h3>

                                        <div class="collapse" id="collapsecheque">
                                            <div class="py-2">
                                                <p class="mb-0">You will have to pay the corresponding order amount when
                                                    you
                                                    receive the goods</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="border p-3 mb-3">
                                        <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse"
                                                               href="#collapsebank"
                                                               role="button" aria-expanded="false"
                                                               aria-controls="collapsebank">Direct Bank Transfer</a>
                                        </h3>

                                        <div class="collapse" id="collapsebank">
                                            <div class="py-2">
                                                <p class="mb-0">Make your payment directly into our bank account. Please
                                                    use
                                                    your Order ID as the payment reference. Your order won’t be shipped
                                                    until the funds have cleared in our account.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="border p-3 mb-5">
                                        <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse"
                                                               href="#collapsepaypal"
                                                               role="button" aria-expanded="false"
                                                               aria-controls="collapsepaypal">Paypal</a></h3>

                                        <div class="collapse" id="collapsepaypal">
                                            <div class="py-2">
                                                <p class="mb-0">Make your payment directly into our bank account. Please
                                                    use
                                                    your Order ID as the payment reference. Your order won’t be shipped
                                                    until the funds have cleared in our account.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-primary btn-lg py-3 btn-block" type="submit">Place Order
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="d-none">
                            <input id="c_total_product" name="c_total_product" type="text">
                            <input id="c_shipping_price" name="c_shipping_price" type="text">
                            <input id="c_discount_price" name="c_discount_price" type="text">
                            <input id="c_total" name="c_total" type="text">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        function calcTotalCheckout() {
            let list_price_product = document.getElementsByClassName('productPrice');
            let total_fee = 0;
            let ship = 0;
            let discount = 0;
            let total_price = 0;

            for (let i = 0; i < list_price_product.length; i++) {
                let price_product = list_price_product[i];
                total_fee = total_fee + parseFloat(price_product.innerText);
            }

            total_price = total_fee + ship - discount;

            $('#c_total_product').val(total_price);
            $('#c_shipping_price').val(ship);
            $('#c_discount_price').val(discount);
            $('#c_total').val(total_price);

            $('#cart_subtotal').text(total_price);
            $('#ship_fee').text(ship);
            $('#discount_fee').text(discount);
            $('#order_total').text(total_price);
        }

        calcTotalCheckout();
    </script>
@endsection
