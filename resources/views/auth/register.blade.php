@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow">Home</a>                    
                <span></span> Registro
            </div>
        </div>
    </div>
    <section class="pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-lg-6">
                        <div class="login_wrap widget-taber-content p-30 background-white border-radius-5">
                                <div class="padding_eight_all bg-white">
                                    <div class="heading_s1">
                                        <h3 class="mb-30">Crear una cuenta</h3>
                                    </div>                     
                                    @include('admin.modules.errors')

                                    <form method="post" action="{{ route('register') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nombre">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar password">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-fill-out btn-block hover-up" name="login">Registrarme</button>
                                        </div>
                                    </form>                                        
                                    <div class="text-muted text-center">Ya tienes una cuenta? <a href="{{ route('login') }}">Inicia sesión ahora</a></div>
                                </div>
                            </div>
                        </div>                            
                        <div class="col-lg-6">
                           <img src="assets/imgs/imagen-login.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
