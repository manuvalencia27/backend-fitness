@extends('layouts.admin')

@section('contenido')

    @include('admin.modules.success')

    <div class="row">
        <div class="col-md-12">
            <table class="table table-responsive-sm">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Comentario</th>
                    <th>Usuario</th>
                    <th>Producto</th>
                    <th>Fecha y hora</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($comments as $comment)
                    <tr>
                        <td>{{ $comment->id }}</td>
                        <td>{{ $comment->comment }}</td>
                        <td>{{ $comment->user->name }}</td>
                        <td>{{ $comment->product->name }}</td>
                        <td>{{ $comment->created_at }}</td>
                        <td>
        
                            <div class="d-flex align-items-center">
                                <a href="{{ action([\App\Http\Controllers\Backend\CommentController::class, 'edit'], $comment->id) }}" class="mr-3">
                                    <button class="btn btn-info" type="button">Editar</button>
                                </a>
        
                                <form method="post" action="{{ action([\App\Http\Controllers\Backend\CommentController::class, 'destroy'], $comment) }}" onclick="return confirm('Está seguro que desea eliminar este elemento?')">
                                    @csrf
                                    <input type="hidden" name="_method" value="delete" />
                                    <button class="btn btn-danger" type="submit">Borrar</button>
                                </form>
                            </div>
        
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{-- {{ $users->links() }} --}}
        </div>
    </div>
@endsection