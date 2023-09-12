@extends('layouts.admin')

@section('contenido')
<div class="row">
    <div class="col-md-12">
        <table class="table table-responsive-sm">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tags as $tag)
                <tr>
                    <td>{{ $tag->id }}</td>
                    <td>{{ $tag->name }}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <a href="{{ action([\App\Http\Controllers\Backend\TagController::class, 'edit'], $tag->id) }}" class="mr-3">
                                <button class="btn btn-info" type="button">Editar</button>
                            </a>
    
                            <form method="post" action="{{ action([\App\Http\Controllers\Backend\TagController::class, 'destroy'], $tag) }}" onclick="return confirm('Está seguro que desea eliminar este elemento?')">
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
        {{-- {{ $tag->links() }} --}}
    </div>
</div>
@endsection