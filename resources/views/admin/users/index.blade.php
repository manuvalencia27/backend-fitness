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
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->role == 1)
                                {{ 'Admin' }}
                            @else
                                {{ 'Cliente' }}
                            @endif

                        </td>
                        <td>
        
                            <div class="d-flex align-items-center">
                                <a href="{{ action([\App\Http\Controllers\Backend\UserController::class, 'edit'], $user->id) }}" class="mr-3">
                                    <button class="btn btn-info" type="button">Editar</button>
                                </a>
        
                                <form method="post" action="{{ action([\App\Http\Controllers\Backend\UserController::class, 'destroy'], $user) }}" onclick="return confirm('Está seguro que desea eliminar este elemento?')">
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