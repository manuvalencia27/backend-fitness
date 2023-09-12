@extends('layouts.admin')

@section('contenido')

    @include('admin.modules.success')

    <div class="row">
        <div class="col-md-12">
            <table class="table table-responsive-sm">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Tag</th>
                    <th>Imágen</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        @isset($category->tag)
                            <td>{{ $category->tag->name }}</td>
                        @else
                            <td> Sin tag </td>
                        @endisset
                        <td>{{ $category->image }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="{{ action([\App\Http\Controllers\Backend\CategoryController::class, 'edit'], $category->id) }}" class="mr-3">
                                    <button class="btn btn-info" type="button">Editar</button>
                                </a>
        
                                <form method="post" action="{{ action([\App\Http\Controllers\Backend\CategoryController::class, 'destroy'], $category) }}" onclick="return confirm('Está seguro que desea eliminar este elemento?')">
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
            {{-- {{ $categorys->links() }} --}}
        </div>
    </div>
@endsection