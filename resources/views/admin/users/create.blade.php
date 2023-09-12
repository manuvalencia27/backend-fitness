@extends('layouts.admin')


@section('contenido')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <strong>Usuarios</strong>
                </div>
                <div class="card-body">
                    
                    @include('admin.modules.errors')

                    @isset($user)
                        <form method="post" action="{{ action([\App\Http\Controllers\Backend\UserController::class, 'update'], $user) }}">
                            @csrf

                            <input type="hidden" name="_method" value="patch" />

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        <input class="form-control" value="{{ $user->name }}" name="name" id="name" type="text" placeholder="Ingrese un nombre" autocomplete="off">
                                    </div>
                                </div>
            
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Rol</label>
                                        <select class="form-control" name="role">
                                            <option value="">----Seleccionar----</option>
                                            <option value="1" @if($user->role == 1) selected @endif>Administrador</option>
                                            <option value="2" @if($user->role == 2) selected @endif>Cliente</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Email</label>
                                        <input class="form-control" value="{{ $user->email }}" name="email" id="email" type="text" placeholder="Ingrese un email" autocomplete="off">
                                    </div>
                                </div>
            
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Contraseña</label>
                                        <input class="form-control" id="password-input" type="password" name="password" placeholder="Ingrese la contraseña provisional">
                                    </div>
                                </div>
            
                                <div class="col-sm-12">
                                    <button class="btn btn-info" type="submit">Editar</button>
                                </div>
                            </div>
                        </form>
                    @else
                        <form method="post" action="{{ action([\App\Http\Controllers\Backend\UserController::class, 'store']) }}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        <input class="form-control" name="name" id="name" type="text" placeholder="Ingrese un nombre" autocomplete="off">
                                    </div>
                                </div>
            
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Rol</label>
                                        <select class="form-control" name="role">
                                            <option value="">----Seleccionar----</option>
                                            <option value="1">Administrador</option>
                                            <option value="2">Cliente</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Email</label>
                                        <input class="form-control" name="email" id="email" type="text" placeholder="Ingrese un email" autocomplete="off">
                                    </div>
                                </div>
            
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Contraseña</label>
                                        <input class="form-control" id="password-input" type="password" name="password-input" placeholder="Ingrese la contraseña provisional">
                                    </div>
                                </div>
            
                                <div class="col-sm-12">
                                    <button class="btn btn-info" type="submit">Guardar</button>
                                </div>
                            </div>
                        </form>
                    @endisset
                </div>
            </div>
        </div>
    </div>

@endsection