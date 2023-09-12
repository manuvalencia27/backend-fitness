<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>Sport Fitness Sitio Oficial</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <link rel="shortcut icon" type="image/x-icon"
        href="//sportfitness.co/cdn/shop/files/F_LOGO_SPORTFITNESS_32x32.png?v=1613698953">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <!-- Scripts -->
    <!-- Importar los js que se usarán con vue -->
    @vite('resources/js/cart.js')
    @yield('library')
</head>

<body>
    <header class="header-area header-style-1 header-height-2">
        <div class="header-top header-top-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-4">
                    </div>
                    <div class="col-xl-6 col-lg-4">
                        <div class="text-center">
                            <div id="news-flash" class="d-inline-block">
                                <ul>
                                    <li>Envíos a todo colombia <a href="{{ route('shop') }}">Ver detalle</a></li>
                                    <li>Compra de productos deportivos</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info header-info-right">
                            @guest
                                @if (Route::has('login'))
                                    <ul>
                                        <li><i class="fi-rs-key"></i><a href="{{ route('login') }}">{{ __('Login') }}</a>
                                            / <a href="{{ route('register') }}">{{ __('Registro') }}</a>
                                    </ul>
                                @endif
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <a href="{{ route('home') }}"><img src="{{ asset('assets/imgs/logo/logo.png') }}"
                                alt="logo"></a>
                    </div>
                    <div class="header-right">
                        <div class="search-style-1">
                        </div>
                        <div class="header-action-right">
                            <div class="header-action-2">
                                <div class="header-action-icon-2">                                    
                                    <div id="cart-component">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-block d-lg-none">
                        <a href="{{ route('home') }}"><img src="assets/imgs/logo/logo.png" alt="logo"></a>
                    </div>
                    <div class="header-nav d-none d-lg-flex">
                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                            <nav>
                                <ul>
                                    <li><a class="active" href="{{ route('home') }}">Home </a></li>
                                    <li><a href="{{ route('shop') }}">Tienda</a></li>
                                    @guest
                                    @else
                                        <li><a href="#">{{ Auth::user()->name }}<i
                                                    class="fi-rs-angle-down"></i></a>
                                            <ul class="sub-menu">
                                                <li><a href="#">Historial de compras</a></li>
                                                <li><a href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                                  document.getElementById('logout-form').submit();">
                                                        {{ __('Cerrar Sesion') }}
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                        class="d-none">
                                                        @csrf
                                                    </form>
                                                </li>
                                            </ul>
                                        </li>
                                    @endguest
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="py-4">
        @yield('content')
    </main>

    <footer class="main">
        <section class="newsletter p-30 text-white wow fadeIn animated">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 mb-md-3 mb-lg-0">
                        <div class="row align-items-center">
                            <div class="col flex-horizontal-center">
                                <img class="icon-email" src="assets/imgs/theme/icons/icon-email.svg" alt="">
                                <h4 class="font-size-20 mb-0 ml-3">Suscríbete a nuestra newsletter y recibe nuestras
                                    promociones:</h4>
                            </div>
                            <div class="col my-4 my-md-0 des">
                                <h5 class="font-size-15 ml-4 mb-0"> <strong>¡Recibe $5 para tu primera compra en
                                        Sportfitness!</strong></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <!-- Subscribe Form -->
                        <form class="form-subcriber d-flex wow fadeIn animated">
                            <input type="email" style="border: 1px solid #000"
                                class="form-control bg-white font-small" placeholder="Email">
                            <button class="btn bg-dark text-white" type="submit">Subscribe</button>
                        </form>
                        <!-- End Subscribe Form -->
                    </div>
                </div>
            </div>
        </section>
        <section class="section-padding footer-mid footerImage">
            <div class="container pt-15 pb-20">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="widget-about font-md mb-md-5 mb-lg-0">
                            <div class="logo logo-width-1 wow fadeIn animated">
                                <a href="/"><img src="{{ asset('assets/imgs/logo/logo.png') }}"
                                        alt="logo"></a>
                            </div>
                            <h5 class="mt-20 mb-10 fw-600 text-grey-4 wow fadeIn animated">Contacto</h5>
                            <p class="wow fadeIn animated">
                                <strong>Celular: </strong>+57 318-694-6283
                            </p>
                            <p class="wow fadeIn animated">
                                <strong>Email: </strong>meva9527@gmail.com
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 mob-center">
                        <h5 class="widget-title wow fadeIn animated">Medios de pago</h5>
                        <div class="row">
                            <div class="col-md-4 col-lg-12 mt-md-3 mt-lg-0">
                                <p class="mb-20 wow fadeIn animated">Metodos de pago seguros</p>
                                <img class="wow fadeIn animated" src="{{ asset ('assets/imgs/theme/payment-method.png')}}"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container pb-20 wow fadeIn animated mob-center">
            <div class="row">
                <div class="col-12 mb-20">
                    <div class="footer-bottom"></div>
                </div>
                <div class="col-lg-6">
                    <p class="text-lg-end text-start font-sm text-muted mb-0">
                        &copy; <strong class="text-brand">Manuel Valencia</strong> All rights reserved
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Vendor JS-->
    <script src="{{ asset('assets/js/vendor/modernizr-3.6.0.min.js') }} "></script>
    <script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }} "></script>
    <script src="{{ asset('assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }} "></script>
    <script src="{{ asset('assets/js/plugins/slick.js') }} "></script>
    <script src="{{ asset('assets/js/plugins/jquery.syotimer.min.js') }} "></script>
    <script src="{{ asset('assets/js/plugins/wow.js') }} "></script>
    <script src="{{ asset('assets/js/plugins/jquery-ui.js') }} "></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.js') }} "></script>
    <script src="{{ asset('assets/js/plugins/magnific-popup.js') }} "></script>
    <script src="{{ asset('assets/js/plugins/select2.min.js') }} "></script>
    <script src="{{ asset('assets/js/plugins/waypoints.js') }} "></script>
    <script src="{{ asset('assets/js/plugins/counterup.js') }} "></script>
    <script src="{{ asset('assets/js/plugins/jquery.countdown.min.js') }} "></script>
    <script src="{{ asset('assets/js/plugins/images-loaded.js') }} "></script>
    <script src="{{ asset('assets/js/plugins/isotope.js') }} "></script>
    <script src="{{ asset('assets/js/plugins/scrollup.js') }} "></script>
    <script src="{{ asset('assets/js/plugins/jquery.vticker-min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.theia.sticky.js') }} "></script>
    <script src="{{ asset('assets/js/plugins/jquery.elevatezoom.js') }} "></script>
    <!-- Template  JS -->
    <script src="{{ asset('assets/js/main.js?v=3.3') }} "></script>
    <script src="{{ asset('assets/js/shop.js?v=3.3') }} "></script>
</body>

</html>
