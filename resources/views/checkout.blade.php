@extends('layouts.app')

@section('library')
    @vite('resources/js/checkout.js')
@endsection

@section('content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">Home</a>
                <span></span> Shop
                <span></span> Checkout
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50" id="checkout">
    </section>
</main>
@endsection