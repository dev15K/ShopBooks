@extends('ui.layouts.action.master')
@section('title')
    Detail Order
@endsection
@section('content')
    <div class="pagetitle">
        <h1>Detail Order</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Detail Order</li>
            </ol>
        </nav>
    </div>
    <div class="container-fluid">
        <h3 class="">Order Information</h3>
        <form class="mb-2">
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" class="form-control" id="full_name" disabled value="{{ $order->full_name }}">
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" disabled value="{{ $order->email }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" disabled value="{{ $order->phone }}">
                </div>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea rows="5" class="form-control" id="address" disabled>{{ $order->address }}</textarea>
            </div>
            <div class="form-group">
                <label for="note">Notes</label>
                <textarea rows="5" class="form-control" id="note" disabled>{{ $order->notes }}</textarea>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="order_method">Order Method</label>
                    <input type="text" class="form-control" id="order_method" disabled value="{{ $order->order_method }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="status">Status</label>
                    <input type="text" class="form-control" id="status" disabled value="{{ $order->status }}">
                </div>
            </div>
        </form>
        <h5>List Product </h5>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order_items as $order_item)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>
                        <a href="{{ route('main.product.detail', $order_item->product->id) }}">{{ $order_item->product->name }}</a>
                    </td>
                    <td>${{ $order_item->product->price }}</td>
                    <td>{{ $order_item->quantity }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="row justify-content-end">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12 text-right border-bottom mb-5">
                        <h3 class="text-black h4 text-uppercase">Totals</h3>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <span class="text-black">Total Fee:</span>
                    </div>
                    <div class="col-md-6 text-right">
                        <strong class="text-black">$
                            <span id="total_fee">{{ $order->total_price }}</span>
                        </strong>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <span class="text-black">Ship Fee:</span>
                    </div>
                    <div class="col-md-6 text-right">
                        <strong class="text-black">$
                            <span id="ship_fee">{{ $order->shipping_price }}</span>
                        </strong>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <span class="text-black">Discount Fee:</span>
                    </div>
                    <div class="col-md-6 text-right">
                        <strong class="text-black">-$
                            <span id="discount_fee">{{ $order->discount_price }}</span>
                        </strong>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-6">
                        <span class="text-black">Total:</span>
                    </div>
                    <div class="col-md-6 text-right">
                        <strong class="text-black">$
                            <span id="total_price">{{ $order->total }}</span>
                        </strong>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <a href="#" class="btn btn-primary btn-lg py-3 btn-block">
                            Re-buy now
                        </a>
                    </div>
                    <div class="col-md-4">
                        <form method="post" action="{{ route('order.me.cancel', $order->id) }}">
                            @csrf
                            <button type="submit" {{ $order->status == \App\Enums\OrderStatus::PROCESSING ? '' : 'disabled' }} class="btn btn-danger btn-lg py-3 btn-block">
                                Cancel Order
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection