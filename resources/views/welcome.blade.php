@extends('layouts.app')

@section('content')
<main class="main">

    {{-- sección de los banners principales --}}
    <section class="home-slider position-relative pt-50">
        <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
            <div class="single-hero-slider single-animation-wrap">
                <div class="container">
                    <div class="row align-items-center slider-animated-1">
                        <div class="col-lg-5 col-md-6">
                            <div class="hero-slider-content-2">
                                <h4 class="animated">Encontrarás Ofertas</h4>
                                <h2 class="animated fw-900">Super precios</h2>
                                <h1 class="animated fw-900 text-brand">En todos los productos</h1>
                                <a class="animated btn btn-brush btn-brush-3" href="{{ route('shop') }}"> Comprar Ahora </a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="single-slider-img single-slider-img-1">
                                <img class="animated slider-1-1" src="assets/imgs/slider/slider-1.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-hero-slider single-animation-wrap">
                <div class="container">
                    <div class="row align-items-center slider-animated-1">
                        <div class="col-lg-5 col-md-6">
                            <div class="hero-slider-content-2">
                                <h4 class="animated">Hot promotions</h4>
                                <h2 class="animated fw-900">Fashion Trending</h2>
                                <h1 class="animated fw-900 text-7">Great Collection</h1>
                                <p class="animated">Save more with coupons & up to 20% off</p>
                                <a class="animated btn btn-brush btn-brush-2" href="product-details.html"> Discover Now </a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="single-slider-img single-slider-img-1">
                                <img class="animated slider-1-2" src="assets/imgs/slider/slider-2.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>                
        </div>
        <div class="slider-arrow hero-slider-1-arrow"></div>
    </section>

    <section class="product-tabs section-padding position-relative wow fadeIn animated">
        <div class="bg-square"></div>
        <div class="container">
            <div class="tab-header">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    @foreach ($tags as $tag)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="nav-tab-{{ $tag->name }}" data-bs-toggle="tab" data-bs-target="#tab-{{ $tag->name }}" type="button" role="tab" aria-controls="tab-{{ $tag->name }}" aria-selected="true">{{ $tag->name }}</button>
                        </li>
                    @endforeach
                </ul>
                <a href="{{ route ('shop') }}" class="view-more d-none d-md-flex">Ver más<i class="fi-rs-angle-double-small-right"></i></a>
            </div>
            <!--End nav-tabs-->
            <div class="tab-content wow fadeIn animated" id="myTabContent">
                @foreach ($tags as $tag)
                    <div class="tab-pane fade show active" id="tab-{{ $tag->name }}" role="tabpanel" aria-labelledby="tab-one">
                        <div class="row product-grid-4">

                            @foreach ($tag->products as $product)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
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
                                            <h2><a href="#">{{ $product->name }}</a></h2>
                                            <div class="rating-result" title="90%">
                                            </div>
                                            <div class="product-price">
                                                <span>${{ $product->regular_price }} </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            <!--End divs-productos-->
        </div>
    </section>

    <section class="popular-categories section-padding mt-15 mb-25">
        <div class="container wow fadeIn animated">
            <h3 class="section-title mb-20"><span>Cateogrías</span> Populares</h3>
            <div class="carausel-6-columns-cover position-relative">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-arrows"></div>
                <div class="carausel-6-columns" id="carausel-6-columns">
                    @foreach ($categories as $category)
                        @if (count($category->products)>0)
                        <div class="card-1">
                            <figure class=" img-hover-scale overflow-hidden">
                                <a href="{{ action([\App\Http\Controllers\CategoryController::class, 'show'], $category->id) }}"><img src="{{ asset ('assets/imgs/shop')}}/{{ $category->image }}.jpg" alt="{{ $category->name}}"></a>
                            </figure>
                            <h5><a href="{{ action([\App\Http\Controllers\CategoryController::class, 'show'], $category->id) }}">{{ $category->name }}</a></h5>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>    
</main>
@endsection