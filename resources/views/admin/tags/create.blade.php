@extends('layouts.admin')


@section('contenido')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <strong>Tags</strong>
                </div>
                <div class="card-body">
                    
                    @include('admin.modules.errors')

                    @isset($tag)
                        <form method="post" action="{{ action([\App\Http\Controllers\Backend\TagController::class, 'update'], $tag) }}">
                            @csrf

                            <input type="hidden" name="_method" value="patch" />

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Nombre del tag</label>
                                        <input class="form-control" value="{{ $tag->name }}" name="name" id="name" type="text" placeholder="Ingrese un nombre tag" autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <button class="btn btn-info" type="submit">Editar</button>
                                </div>
                            </div>
                        </form>
                    @else
                        <form method="post" action="{{ action([\App\Http\Controllers\Backend\TagController::class, 'store']) }}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        <input class="form-control" name="name" id="name" type="text" placeholder="Ingrese un nombre tag" autocomplete="off">
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