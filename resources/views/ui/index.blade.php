@extends('ui.layouts.master')
@section('title')
    Homepage
@endsection
<style>
    .description-main {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@section('content')
    <div class="site-blocks-cover" style="background-image: url({{asset('ui/images/bg-book-blue.avif')}});"
         data-aos="fade">
        <div class="container">
            <div class="row align-items-start align-items-md-center justify-content-end">
                <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
                    <h1 class="mb-2">Finding Your Favorite Books</h1>
                    <div class="intro-text text-center text-md-left">
                        <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis
                            quam. Integer accumsan tincidunt fringilla. </p>
                        <p>
                            <a href="#" class="btn btn-sm btn-primary">Shop Now</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section site-section-sm site-blocks-1">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
                    <div class="icon mr-4 align-self-start">
                        <span class="icon-truck"></span>
                    </div>
                    <div class="text">
                        <h2 class="text-uppercase">Free Shipping</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer
                            accumsan tincidunt fringilla.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon mr-4 align-self-start">
                        <span class="icon-refresh2"></span>
                    </div>
                    <div class="text">
                        <h2 class="text-uppercase">Free Returns</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer
                            accumsan tincidunt fringilla.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon mr-4 align-self-start">
                        <span class="icon-help"></span>
                    </div>
                    <div class="text">
                        <h2 class="text-uppercase">Customer Support</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer
                            accumsan tincidunt fringilla.</p>
                    </div>
                </div>
            </div>
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
                            <div class="item" style="height: 500px">
                                <div class="block-4 text-center">
                                    <figure class="block-4-image d-flex align-items-center justify-content-center">
                                        <a href="{{ route('main.product.detail', $new_product->id) }}">
                                            <img src="{{ asset($new_product->thumbnail) }}" alt="Image placeholder"
                                                 class="img-fluid" style="width: 250px; height: 280px"></a>
                                    </figure>
                                    <div class="block-4-text p-4" style="height: 120px">
                                        <h3>
                                            <a class="text_truncate_2_"
                                               href="{{ route('main.product.detail', $new_product->id) }}">{{ $new_product->name }}</a>
                                        </h3>
                                        <p class="text-danger font-weight-bold">${{ $new_product->price }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    @php
        $i = 1;
    @endphp
    @foreach($categories as $category)
        @if($category['count'] > 0)
            <div class="site-section block-3 site-blocks-2 @php  if ($i % 2 === 0) echo 'bg-light'; @endphp">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-7 site-section-heading text-center pt-4">
                            <h2>{{ $category['name'] }}</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="nonloop-block-3 owl-carousel">
                                @foreach($category['products'] as $_product)
                                    @if($_product)
                                        <div class="item" style="height: 500px">
                                            <div class="block-4 text-center">
                                                <figure
                                                    class="block-4-image d-flex align-items-center justify-content-center">
                                                    <a href="{{ route('main.product.detail', $_product['id']) }}">
                                                        <img src="{{ asset($_product['thumbnail']) }}"
                                                             alt="Image placeholder"
                                                             class="img-fluid" style="width: 250px; height: 280px"></a>
                                                </figure>
                                                <div class="block-4-text p-4" style="height: 120px">
                                                    <h3>
                                                        <a class="text_truncate_2_"
                                                           href="{{ route('main.product.detail', $_product['id']) }}">{{ $_product['name'] }}</a>
                                                    </h3>
                                                    <p class="text-danger font-weight-bold">
                                                        ${{ $_product['price'] }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @php
            ++$i;
        @endphp
    @endforeach

    <div class="site-section block-8">
        <div class="container">
            <div class="row justify-content-center  mb-5">
                <div class="col-md-7 site-section-heading text-center pt-4">
                    <h2>Big Sale!</h2>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-12 col-lg-7 mb-5">
                    <a href="#"><img src="{{ asset('ui/images/blog_1.jpg') }}" alt="Image placeholder"
                                     class="img-fluid rounded"></a>
                </div>
                <div class="col-md-12 col-lg-5 text-center pl-md-5">
                    <h2><a href="#">50% less in all items</a></h2>
                    <p class="post-meta mb-4">By <a href="#">Carl Smith</a> <span class="block-8-sep">&bullet;</span>
                        September 3, 2018</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam iste dolor accusantium facere
                        corporis ipsum animi deleniti fugiat. Ex, veniam?</p>
                    <p><a href="#" class="btn btn-primary btn-sm">Shop Now</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
