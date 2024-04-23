@extends('ui.layouts.master')
@section('title')
    Product detail
@endsection
@section('content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="{{ route('home') }}">Home</a>
                    <span class="mx-2 mb-0">/</span>
                    <a href="{{ route('main.shop') }}">Shop</a>
                    <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">{{ $product->name }}</strong></div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <form method="post" action="{{ route('cart.add') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset($product->thumbnail) }}" alt="Image" class="img-fluid border">
                        @php
                            $gallery = $product->gallery;
                            $list_gallery = explode(',', $gallery);
                        @endphp
                        <div class="list-gallery d-flex">
                            @foreach($list_gallery as $image)
                                <img src="{{ asset($image) }}" alt="Image" class="mt-3 mr-2 p-2 border" width="100px">
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h2 class="text-black">{{ $product->name }}</h2>
                        <p class="mb-4">
                           {!! $product->short_description !!}
                        </p>
                        <p><strong class="text-primary h4">${{ $product->price }}</strong></p>
                        <div class="mb-5">
                            <div class="input-group mb-3" style="max-width: 120px;">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                                </div>
                                <input type="number" class="form-control text-center" value="1" min="1"
                                       max="{{ $product->quantity }}" placeholder="" name="quantity"
                                       aria-label="Example text with button addon" aria-describedby="button-addon1">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                                </div>
                            </div>

                        </div>
                        <div class="d-none">
                            <input type="text" value="{{ $product->id }}" name="product_id">
                        </div>
                        <p>
                            <button type="submit" class="buy-now btn btn-sm btn-primary">Add To Cart</button>
                        </p>

                    </div>
                    <div class="description m-3">
                        {!! $product->description !!}
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="site-section block-3 site-blocks-2 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 site-section-heading text-center pt-4">
                    <h2>New Products</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="nonloop-block-3 owl-carousel">
                        @foreach($new_products as $new_product)
                            <div class="item">
                                <div class="block-4 text-center">
                                    <figure class="block-4-image">
                                        <img src="{{ asset($new_product->thumbnail) }}" alt="Image placeholder"
                                             class="img-fluid">
                                    </figure>
                                    <div class="block-4-text p-4">
                                        <h3>
                                            <a href="{{ route('main.product.detail', $new_product->id) }}"> {{ $new_product->name }}</a>
                                        </h3>
                                        <p class="text-danger font-weight-bold">$ {{ $new_product->price }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
