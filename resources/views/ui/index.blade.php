@extends('ui.layouts.master')
@section('title')
    Homepage
@endsection
<style>
    .mega-sidebar {
        border-radius: 10px;
    }

    ul {
        list-style: none;
    }

    ul > li > a {
        color: #000;
    }

    .menu-item {
        font-style: inherit;
        font-weight: inherit;
    }

    ul > li > a:hover {
        text-decoration: none;
        color: #DD4A68;
    }

    .icon-thumbnail {
        border-radius: 40%;
    }

    .shadow-element {
        /* Kích thước của đổ bóng (offset-x offset-y blur-radius spread-radius color) */
        box-shadow: 2px 2px 4px 0px rgba(0, 0, 0, 0.5);
    }

    .left-banner > div {
        height: 376px;
    }

    .center-banner > div {
        height: 376px;
        width: 100%;
    }

    .right-banner > div {
        height: 376px;
        max-width: 265px;
        width: 100%;
    }

    .carousel-inner {
        height: 376px
    }

    .carousel-item > img {
        height: 100%;
        max-height: 376px
    }

    .right-banner-item {
        border-radius: 10px;
        box-shadow: 0 1px 2px 0 rgba(60, 64, 67, .1), 0 2px 6px 2px rgba(60, 64, 67, .15);
        display: flex;
        margin-bottom: 15.5px;
        min-height: calc(33.33333% - 10px);
        overflow: hidden;
        width: 100%;
    }

    .right-banner-item > img {
        height: auto;
        max-width: 100%;
    }

    .list-product {
        border-radius: 10px;
    }

    .product-sale {
        border-radius: 15px;
    }

    .product-start {
        width: 100%;
        padding: 16px;
        background-color: #4a4a4a;
    }

    .flash-sale {
        background: linear-gradient(170deg, #f93a67, #891010);
        color: #fff;
        border-radius: 10px;
        padding: 16px;
        width: 50%;
        font-size: 20px;
        font-weight: 600;
        text-align: center;
    }

    .flash-sale:hover,
    .hot-sale:hover {
        text-decoration: none;
        color: #fff;
    }

    .hot-sale {
        background: rgba(0, 0, 0, .851);
        border: 0 solid transparent;
        box-sizing: border-box;
        color: #fff;
        font-size: 20px;
        font-weight: 600;
        border-radius: 10px;
        padding: 16px;
        width: 50%;
        text-align: center;
    }

    .full-sale {
        background: linear-gradient(rgb(248, 62, 96), rgb(254, 80, 72)) 0% 0% / cover;
    }

    .product,
    .product-item {
        border-radius: 10px;
        color: #2c2b2b;
    }

    .product:hover,
    .product-item:hover {
        text-decoration: none;
        color: #000;
    }

    .image-product {
        overflow: hidden;
        border-radius: 10px;
    }

    .image-product img {
        height: auto;
        width: auto;
        max-width: 200px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .image-product:hover img {
        transform: scale(1.1);
    }

    .product-item {
        background-color: #fff;
        max-width: 20%;
        width: 100%;
        margin-right: 1%;
    }

    .fw-600 {
        font-weight: 600;
    }

    .list-image{
        max-width: 100%;
    }

    .img-sale{
        max-width: 25%;
        width: auto;
        margin-right: 16px;
        height: auto;
        border-radius: 10px;
    }
</style>
@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-3 col-sm-12 left-banner">
                <div class="mega-sidebar border bg-white shadow-element ">
                    <ul>
                        @foreach($categories as $category)
                            <li>
                                <a href="#" class="d-flex align-items-center justify-content-between">
                                   <span>
                                       <img src="{{ $category->thumbnail }}" alt="" width="20px" class="icon-thumbnail">
                                       <span class="menu-item">{{ $category->name }}</span>
                                   </span>
                                    <i class="fa-solid fa-angle-right pr-3"></i>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 center-banner">
                <div id="carouselExampleControls" class="carousel slide shadow-element" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('ui/images/banner1.webp') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('ui/images/banner2.webp') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('ui/images/banner3.webp') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('ui/images/banner4.webp') }}" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls"
                            data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-target="#carouselExampleControls"
                            data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 right-banner">
                <div class="row" style="height: 376px;">
                    <a href="#" class="col-md-12 right-banner-item">
                        <img src="{{ asset('ui/images/sp-banner-1.webp') }}" alt="">
                    </a>
                    <a href="#" class="col-md-12 right-banner-item">
                        <img src="{{ asset('ui/images/sp-banner-2.webp') }}" alt="">
                    </a>
                    <a href="#" class="col-md-12 right-banner-item">
                        <img src="{{ asset('ui/images/sp-banner-3.webp') }}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="list-product container mt-3 ">
        <div class="product-sale">
            <div class="product-start d-flex align-items-center">
                <a href="#" class="flash-sale">
                    FLASH SALE 9 - 11H
                </a>
                <a href="#" class="hot-sale">
                    HOTSALE CUỐI TUẦN
                </a>
            </div>

            <div class="full-sale">
                <div class="product-list d-flex align-items-center justify-content-start p-3">
                    @foreach($new_products as $new_product)
                        <a href="#" class="product m-2 bg-white border shadow-element">
                            <div class="image-product">
                                <img src="{{ $new_product->thumbnail }}" alt="Image">
                            </div>
                            <div class="product-info mt-2 m-2">
                                <h5 class="name">{{ $new_product->name }}</h5>
                                <div class="price mt-3">
                                    <span class="text-danger">{{ $new_product->price }} VND</span>
                                    <strike class="text-secondary">{{ $new_product->price }} VND</strike>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <h3 class="text-left text-uppercase fw-600">
            Sản phẩm nổi bật
        </h3>
        <div class="list-product d-flex flex-row align-items-center flex-wrap justify-content-start">
            @foreach($new_products as $new_product)
                <a href="#" class="product-item shadow-element">
                    <div class="image-product">
                        <img src="{{ $new_product->thumbnail }}" alt="Image">
                    </div>
                    <div class="product-info mt-2 m-2">
                        <h5 class="name">{{ $new_product->name }}</h5>
                        <div class="price mt-3">
                            <span class="text-danger">{{ $new_product->price }} VND</span>
                            <strike class="text-secondary">{{ $new_product->price }} VND</strike>
                        </div>
                    </div>
                    <div class="product-detail d-flex align-items-center justify-content-between p-3">
                        <div class="list-star text-warning  text-nowrap">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <div class="favourite text-nowrap">
                            <span class="small">Yêu thích</span>
                            <i class="fa-regular fa-heart"></i>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <h3 class="text-left mt-5 text-uppercase fw-600">
            Sản phẩm mới nhất
        </h3>
        <div class="list-product d-flex flex-row align-items-center flex-wrap justify-content-start">
            @foreach($new_products as $new_product)
                <a href="#" class="product-item shadow-element">
                    <div class="image-product">
                        <img src="{{ $new_product->thumbnail }}" alt="Image">
                    </div>
                    <div class="product-info mt-2 m-2">
                        <h5 class="name">{{ $new_product->name }}</h5>
                        <div class="price mt-3">
                            <span class="text-danger">{{ $new_product->price }} VND</span>
                            <strike class="text-secondary">{{ $new_product->price }} VND</strike>
                        </div>
                    </div>
                    <div class="product-detail d-flex align-items-center justify-content-between p-3">
                        <div class="list-star text-warning  text-nowrap">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <div class="favourite text-nowrap">
                            <span class="small">Yêu thích</span>
                            <i class="fa-regular fa-heart"></i>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <h3 class="text-left mt-5 text-uppercase fw-600">
            Ưu đãi thanh toán
        </h3>
        <div class="d-flex list-image w-100">
            <img src="{{ asset('ui/images/uu-dai-vppay-apple-080324 (2).webp') }}" alt="" class="img-sale">
            <img src="{{ asset('ui/images/mo-the-hsbc-08-04-2024.webp') }}" alt="" class="img-sale">
            <img src="{{ asset('ui/images/mo-the-vib-update-1604.webp') }}" alt="" class="img-sale">
            <img src="{{ asset('ui/images/momo-5-04-2024-slide.webp') }}" alt="" class="img-sale">
        </div>
        <h3 class="text-left mt-5 text-uppercase fw-600">
            Ưu đã sinh viên
        </h3>
        <div class="d-flex list-image w-100">
            <img src="{{ asset('ui/images/laptop-hssv-sliding-2024.webp') }}" alt="" class="img-sale">
            <img src="{{ asset('ui/images/laptop-hssv-sliding-2024.webp') }}" alt="" class="img-sale">
            <img src="{{ asset('ui/images/laptop-hssv-sliding-2024.webp') }}" alt="" class="img-sale">
            <img src="{{ asset('ui/images/laptop-hssv-sliding-2024.webp') }}" alt="" class="img-sale">
        </div>
        <h3 class="text-left mt-5 text-uppercase fw-600">
            Thương hiệu
        </h3>
        <div class="d-flex list-image w-100">
            <img src="{{ asset('ui/images/apple-chinh-hang-home.webp') }}" alt="" class="img-sale">
            <img src="{{ asset('ui/images/SIS asus.webp') }}" alt="" class="img-sale">
            <img src="{{ asset('ui/images/gian-hang-samsung-home.webp') }}" alt="" class="img-sale">
            <img src="{{ asset('ui/images/xiaomi.webp') }}" alt="" class="img-sale">
        </div>
    </div>
@endsection
