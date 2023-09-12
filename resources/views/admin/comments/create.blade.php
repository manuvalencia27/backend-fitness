@extends('layouts.admin')


@section('contenido')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <strong>Comentarios</strong>
                </div>
                <div class="card-body">
                    
                    @include('admin.modules.errors')

                    <form method="post" action="{{ action([\App\Http\Controllers\Backend\CommentController::class, 'update'], $comment) }}">
                        @csrf

                        <input type="hidden" name="_method" value="patch" />

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="name">Comentario</label>
                                    <textarea class="form-control" id="comment" name="comment" rows="9" placeholder=""> {{$comment->comment }} </textarea>
                                </div>
                            </div>
        
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="name">Usuario</label>
                                    <select class="form-control" name="user_id">
                                        <option value="">----Seleccionar----</option>
                                        @foreach ($users as $user)
                                            @if ($comment->user)
                                                <option value="{{ $user->id }}" @if($comment->user->id == $user->id) selected @endif>{{ $user->name }}</option>
                                            @else
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="name">Producto</label>
                                    <select class="form-control" name="product_id">
                                        <option value="">----Seleccionar----</option>
                                        @foreach ($products as $product)
                                            @if ($comment->product)
                                                <option value="{{ $product->id }}" @if($comment->product->id == $product->id) selected @endif>{{ $product->name }}</option>
                                            @else
                                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <button class="btn btn-info" type="submit">Editar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection