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
                    <th>Slug</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Precio oferta</th>
                    <th>Sku</th>
                    <th>Stock</th>
                    <th>Cantidad</th>
                    <th>Tag</th>
                    <th>Categoría</th>
                    <th>Imágen</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->slug }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->regular_price }}</td>
                        <td>{{ $product->sale_price }}</td>
                        <td>{{ $product->SKU }}</td>
                        <td>{{ $product->stock_status == 'instock' ? 'En stock' : 'Sin stock' }}</td>
                        <td>{{ $product->quantity }}</td>
                        

                        @isset($product->tag)
                            <td>{{ $product->tag->name }}</td>
                        @else
                            <td> Sin tag </td>
                        @endisset
                        <td>{{ $product->image }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="{{ action([\App\Http\Controllers\Backend\ProductController::class, 'edit'], $product->id) }}" class="mr-3">
                                    <button class="btn btn-info" type="button">Editar</button>
                                </a>
        
                                <form method="post" action="{{ action([\App\Http\Controllers\Backend\ProductController::class, 'destroy'], $product) }}" onclick="return confirm('Está seguro que desea eliminar este elemento?')">
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