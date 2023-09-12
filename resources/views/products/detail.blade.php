@extends('layouts.app')

@section('library')
    @vite('resources/js/inicio.js')
@endsection

@section('content')
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Tienda
                    <span></span> Detalle
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div id="product-detail" data-id="{{ $product->id }}">
                            
                        </div>
                    </div>
                    <div class="col-lg-3 primary-sidebar sticky-sidebar">
                        <div class="row">
                            <div class="col-lg-12 col-mg-6"></div>
                            <div class="col-lg-12 col-mg-6"></div>
                        </div>
                        <div class="widget-category mb-30">
                            <h5 class="section-title style-1 mb-30 wow fadeIn animated">Category</h5>
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
@endsection
