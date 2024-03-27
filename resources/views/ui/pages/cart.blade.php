@extends('ui.layouts.master')
@section('title')
    My Cart
@endsection
@section('content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{ route('home') }}">Home</a> <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">Cart</strong></div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            @if(count($carts) > 0)
                <div class="row mb-5">
                    <form class="col-md-12" method="post">
                        <div class="site-blocks-table">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-total">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($carts as $cart)
                                    <tr>
                                        <td class="product-thumbnail">
                                            <img src="{{ asset($cart->product->thumbnail) }}" alt="Image"
                                                 class="img-fluid">
                                        </td>
                                        <td class="product-name">
                                            <h2 class="h5 text-black">{{ $cart->product->name }}</h2>
                                        </td>
                                        <td>$ <span id="productPrice_{{ $cart->id }}">{{ $cart->product->price }}</span>
                                        </td>
                                        <td>
                                            <div class="input-group mb-3" style="max-width: 120px;">
                                                <div class="input-group-prepend">
                                                    <button
                                                        class="btn btn-outline-primary btnDecrease btnChangeQuantity"
                                                        data-id="{{ $cart->id }}" type="button">
                                                        &minus;
                                                    </button>
                                                </div>
                                                <input type="text" class="form-control text-center"
                                                       value="{{ $cart->quantity }}"
                                                       id="inputQuantity_{{ $cart->id }}"
                                                       placeholder="" aria-label="Example text with button addon"
                                                       aria-describedby="button-addon1">
                                                <div class="input-group-append">
                                                    <button
                                                        class="btn btn-outline-primary btnIncrease btnChangeQuantity"
                                                        data-id="{{ $cart->id }}" type="button">
                                                        &plus;
                                                    </button>
                                                </div>
                                            </div>

                                        </td>
                                        <td>$ <span class="totalPriceProduct"
                                                    id="totalPrice_{{ $cart->id }}">{{ $cart->product->price * $cart->quantity }}</span>
                                        </td>
                                        <td>
                                            <button type="button" data-id="{{ $cart->id }}"
                                                    class="btn btn-warning btn-sm btnDeleteCart">X
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="row mb-5">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <form method="post" action="{{ route('cart.clear') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm btn-block">Clear Cart</button>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('main.shop') }}" class="btn btn-outline-primary btn-sm btn-block">Continue
                                    Shopping</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="text-black h4" for="coupon">Coupon</label>
                                <p>Enter your coupon code if you have one.</p>
                            </div>
                            <div class="col-md-8 mb-3 mb-md-0">
                                <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
                            </div>
                            <div class="col-md-4">
                                <button type="button" class="btn btn-primary btn-sm">Apply Coupon</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pl-5">
                        <div class="row justify-content-end">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-12 text-right border-bottom mb-5">
                                        <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <span class="text-black">Total Fee:</span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <strong class="text-black">$
                                            <span id="total_fee">0</span>
                                        </strong>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <span class="text-black">Ship Fee:</span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <strong class="text-black">$
                                            <span id="ship_fee">0</span>
                                        </strong>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <span class="text-black">Discount Fee:</span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <strong class="text-black">-$
                                            <span id="discount_fee">0</span>
                                        </strong>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-md-6">
                                        <span class="text-black">Total:</span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <strong class="text-black">$
                                            <span id="total_price">0</span>
                                        </strong>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="{{ route('checkout.show') }}"
                                           class="btn btn-primary btn-lg py-3 btn-block">
                                            Proceed To Checkout
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <h3 class="">
                    No products!
                </h3>
                <a href="{{ route('main.shop') }}" class="btn btn-primary">Shop Now</a>
            @endif
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('.btnDeleteCart').click(function () {
                let cartID = $(this).data('id');

                deleteCart(cartID);
            })

            $('.btnChangeQuantity').click(function () {
                let cartID = $(this).data('id');

                let inputQuantity = $('#inputQuantity_' + cartID);
                let productPrice = $('#productPrice_' + cartID);
                let totalPrice = $('#totalPrice_' + cartID);

                let old_quantity = inputQuantity.val();

                let new_quantity = 0;

                if ($(this).hasClass('btnIncrease')) {
                    new_quantity = parseInt(old_quantity) + 1;
                } else {
                    new_quantity = parseInt(old_quantity) - 1;
                }

                if (new_quantity === 0) {
                    let is_check = confirmDelete();
                    if (is_check === true) {
                        deleteCart(cartID);
                        return;
                    } else {
                        new_quantity = 1;
                    }
                }

                inputQuantity.val(new_quantity);

                changeQuantity(cartID, new_quantity);

                let price = productPrice.text();

                let total = calcPriceProduct(new_quantity, price);

                totalPrice.text(total);
                calcTotalCart();
            })
        })

        function confirmDelete() {
            let is_check;
            is_check = confirm("You definitely want to remove this product from your cart?") === true;
            return is_check;
        }

        function calcPriceProduct(quantity, price) {
            return parseInt(quantity) * parseFloat(price);
        }

        function calcTotalCart() {
            let list_price_product = document.getElementsByClassName('totalPriceProduct');
            let total_fee = 0;
            let ship = 0;
            let discount = 0;
            let total_price = 0;

            for (let i = 0; i < list_price_product.length; i++) {
                let price_product = list_price_product[i];
                total_fee = total_fee + parseFloat(price_product.innerText);
            }

            total_price = total_fee + ship - discount;

            $('#total_fee').text(total_price);
            $('#ship_fee').text(ship);
            $('#discount_fee').text(discount);
            $('#total_price').text(total_price);
        }

        calcTotalCart();

        async function deleteCart(cartID) {
            let urlDelete = `{{ route('cart.delete', ['id'=>':id']) }}`;
            urlDelete = urlDelete.replace(':id', cartID);

            const formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');

            try {
                await $.ajax({
                    url: urlDelete,
                    method: 'POST',
                    contentType: false,
                    cache: false,
                    data: formData,
                    processData: false,
                    success: function (data) {
                        alert('Successfully removed product from cart!')
                        window.location.reload();
                    },
                    error: function (exception) {
                        console.log(exception)
                        alert(exception.responseText);
                    }
                });
            } catch (error) {
                console.log(error)
                alert('Error, Please try again!');
            }
        }

        async function changeQuantity(cartID, quantity) {
            let urlChange = `{{ route('cart.change.quantity') }}`;

            const formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('cart_id', cartID);
            formData.append('quantity', quantity);

            try {
                await $.ajax({
                    url: urlChange,
                    method: 'POST',
                    contentType: false,
                    cache: false,
                    data: formData,
                    processData: false,
                    success: function (data) {
                        console.log(data)
                    },
                    error: function (exception) {
                        console.log(exception)
                        alert(exception.responseText);
                    }
                });
            } catch (error) {
                console.log(error)
                alert('Error, Please try again!');
            }
        }
    </script>
@endsection
