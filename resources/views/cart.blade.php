@extends('layouts.app')

@section('library')
    @vite('resources/js/view-cart.js')
@endsection

@section('content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">Home</a>
                <span></span> Shop
                <span></span> Your Cart
            </div>
        </div>
    </div>

    <div id="view-cart" data-user="{{ Auth::user()->id }}">

    </div>
</main>
    
@endsection