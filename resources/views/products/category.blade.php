@extends('layouts.app')

@section('content')

    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" rel="nofollow">Home</a>
                    <span></span> Tienda
                    <span></span> {{ $category->name }}
                </div>
            </div>
        </div>

        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="shop-product-fillter">
                            <div class="totall-product">
                                <h3 class="section-title mb-20"><span>Cateogría</span> {{ $category->name }}</h3>
                            </div>
                            <div class="sort-by-product-area">
                                <div class="sort-by-cover mr-10">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps"></i>Show:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span> 50 <i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a class="active" href="#">50</a></li>
                                            <li><a href="#">100</a></li>
                                            <li><a href="#">150</a></li>
                                            <li><a href="#">200</a></li>
                                            <li><a href="#">All</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="sort-by-cover">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span> Featured <i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a class="active" href="#">Featured</a></li>
                                            <li><a href="#">Price: Low to High</a></li>
                                            <li><a href="#">Price: High to Low</a></li>
                                            <li><a href="#">Release Date</a></li>
                                            <li><a href="#">Avg. Rating</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row product-grid-3">
                            @foreach ($products as $product)
                                <div class="col-lg-4 col-md-4 col-6 col-sm-6">
                                    <div class="product-cart-wrap mb-30">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{ action([\App\Http\Controllers\ProductController::class, 'show'], $product->id) }}">
                                                    <img class="default-img" src="{{ asset ('assets/imgs/shop/')}}/{{ $product->image }}-1.png" alt="{{ $product->name}}">
                                                    <img class="hover-img" src="{{ asset ('assets/imgs/shop/')}}/{{ $product->image }}-2.png" alt="{{ $product->name}}">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                {{ $product->category->name }}
                                            </div>
                                            <h2><a href="product-details.html">{{$product->name}}</a></h2>
                                            <div class="rating-result" title="90%">
                                            </div>
                                            <div class="product-price">
                                                @if ($product->sale_price)
                                                    <span>${{ $product->sale_price }} </span>
                                                    <span class="old-price">${{ $product->regular_price }}</span>
                                                @endif
                                            </div>
                                            <div class="product-action-1 show">
                                                @auth
                                                    <a aria-label="Add To Cart" class="action-btn hover-up" href="{{ action([\App\Http\Controllers\ProductController::class, 'show'], $product->id) }}"><i class="fi-rs-shopping-bag-add"></i></a>
                                                @else
                                                    <a aria-label="Add To Cart" class="action-btn hover-up" href="{{ route('login') }}"><i class="fi-rs-shopping-bag-add"></i></a>
                                                @endauth
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{ $products->links() }}
                        </div>
                    </div>
                    <div class="col-lg-3 primary-sidebar sticky-sidebar">
                        <div class="row">
                            <div class="col-lg-12 col-mg-6"></div>
                            <div class="col-lg-12 col-mg-6"></div>
                        </div>
                        <div class="widget-category mb-30">
                            <h5 class="section-title style-1 mb-30 wow fadeIn animated">Categorias</h5>
                            <ul class="categories">
                                @foreach ($categories as $category)
                                    @if (count($category->products)>0)
                                        <li><a href="{{ action([\App\Http\Controllers\CategoryController::class, 'show'], $category->id) }}">{{ $category->name}}</a></li>                                        
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    {{-- <div id="product-detail" data-id="{{ $product->id }}">
        
    </div> --}}
@endsection
