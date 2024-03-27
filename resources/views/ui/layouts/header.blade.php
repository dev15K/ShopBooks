<header class="site-navbar" role="banner">
    <div class="site-navbar-top">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                    <form action="" class="site-block-top-search">
                        <span class="icon icon-search2"></span>
                        <input type="text" class="form-control border-0" placeholder="Search">
                    </form>
                </div>

                <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                    <div class="site-logo">
                        <a href="{{ route('home') }}" class="js-logo-clone">ShopBooks</a>
                    </div>
                </div>

                <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                    <div class="site-top-icons">
                        <ul>
                            @if(\Illuminate\Support\Facades\Auth::check())
                                <li><a href="{{ route('user.profile.show') }}"><span
                                            class="icon icon-person"></span></a></li>
                                <li><a href="#"><span class="icon icon-heart-o"></span></a></li>
                                @php
                                    $my_cart = \App\Models\Cart::where('user_id', Auth::user()->id)->get();
                                    $count = count($my_cart);
                                @endphp
                                <li>
                                    <a href="{{ route('cart.show') }}" class="site-cart">
                                        <span class="icon icon-shopping_cart"></span>
                                        <span class="count">{{ $count }}</span>
                                    </a>
                                </li>
                                <li><a href="{{ route('auth.logout') }}"><i class="fa-solid fa-right-from-bracket"></i></a>
                                </li>
                            @else
                                <li><a href="{{ route('auth.processLogin') }}"><span
                                            class="icon icon-person"></span></a></li>
                            @endif
                            <li class="d-inline-block d-md-none ml-md-0"><a href="#"
                                                                            class="site-menu-toggle js-menu-toggle"><span
                                        class="icon-menu"></span></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @php
        $category_no_parents = \App\Models\Category::where('parent_id', null)->orderByDesc('id')->get();
    @endphp
    <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
            <ul class="site-menu js-clone-nav d-none d-md-block">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="has-children">
                    <a href="">Category</a>
                    <ul class="dropdown">
                        @foreach($category_no_parents as $category_no_parent)
                            @php
                                $category_childs = \App\Models\Category::where('parent_id', $category_no_parent->id)->orderByDesc('id')->get();
                            @endphp
                            @if(count($category_childs) > 0)
                                <li class="has-children">
                                    <a href="{{ route('main.products.list.category', $category_no_parent->id) }} ">{{ $category_no_parent->name }}</a>
                                    <ul class="dropdown">
                                        @foreach($category_childs as $category_child)
                                            <li>
                                                <a href="{{ route('main.products.list.category', $category_child->id) }}">  {{ $category_child->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('main.products.list.category', $category_no_parent->id) }}">{{ $category_no_parent->name }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </li>
                {{--                <li class="has-children">--}}
                {{--                    <a href="{{ route('main.coming.soon') }}">Catalogue</a>--}}
                {{--                    <ul class="dropdown">--}}
                {{--                        <li><a href="#">Menu One</a></li>--}}
                {{--                        <li><a href="#">Menu Two</a></li>--}}
                {{--                        <li><a href="#">Menu Three</a></li>--}}
                {{--                    </ul>--}}
                {{--                </li>--}}
                <li><a href="{{ route('main.shop') }}">Shop</a></li>
                <li><a href="{{ route('main.coming.soon') }}">New Arrivals</a></li>
                <li><a href="{{ route('main.about') }}">About</a></li>
                <li><a href="{{ route('main.contact') }}">Contact</a></li>
            </ul>
        </div>
    </nav>
</header>
