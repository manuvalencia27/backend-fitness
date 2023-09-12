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

                    @isset($category)
                        <form method="post" action="{{ action([\App\Http\Controllers\Backend\CategoryController::class, 'update'], $category) }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="_method" value="patch" />

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        <input class="form-control" name="name" id="name" type="text" placeholder="Ingrese un nombre para el tag" autocomplete="off" value="{{ $category->name }}">
                                    </div>
                                </div>
            
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Tags</label>
                                        <select class="form-control" name="tag_id">
                                            <option value="">----Seleccionar----</option>
                                            @foreach ($tags as $tag)
                                                <option value="{{ $tag->id }}" @if($category->tag->id == $tag->id) selected @endif>{{ $tag->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Slug</label>
                                        <input class="form-control" name="slug" id="slug" type="text" placeholder="Ingrese un slug" autocomplete="off" value="{{ $category->slug }}">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Imágen</label>
                                        <input class="form-control" type="file" name="image" id="image">
                                    </div>
                                </div>
            
                                <div class="col-sm-12">
                                    <button class="btn btn-info" type="submit">Guardar</button>
                                </div>
                            </div>
                        </form>
                    @else
                        <form method="post" action="{{ action([\App\Http\Controllers\Backend\CategoryController::class, 'store']) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        <input class="form-control" name="name" id="name" type="text" placeholder="Ingrese un nombre para el tag" autocomplete="off">
                                    </div>
                                </div>
            
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Tags</label>
                                        <select class="form-control" name="tag_id">
                                            <option value="">----Seleccionar----</option>
                                            @foreach ($tags as $tag)
                                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Slug</label>
                                        <input class="form-control" name="slug" id="slug" type="text" placeholder="Ingrese un slug" autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Imágen</label>
                                        <input class="form-control" type="file" name="image" id="image">
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