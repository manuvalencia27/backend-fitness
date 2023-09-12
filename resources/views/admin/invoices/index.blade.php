@extends('layouts.admin')

@section('contenido')

    @include('admin.modules.success')

    <div class="row">
        <div class="col-md-12">
            <table class="table table-responsive-sm">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre del usuario</th>
                    <th>Cédula</th>
                    <th>Nro Tarjeta de credito</th>
                    <th>CVC</th>
                    <th>Fecha Vencimiento</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($invoices as $invoice)
                    <tr>
                        <td>{{ $invoice->id }}</td>
                        <td>{{ $invoice->user->name }}</td>
                        <td>{{ $invoice->cc }}</td>
                        <td>{{ $invoice->tc }}</td>
                        <td>{{ $invoice->cvc }}</td>
                        <td>{{ $invoice->fecha_vencimiento }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="{{ action([\App\Http\Controllers\Backend\InvoiceController::class, 'edit'], $invoice->id) }}" class="mr-3">
                                    <button class="btn btn-info" type="button">Editar</button>
                                </a>
        
                                <form method="post" action="{{ action([\App\Http\Controllers\Backend\InvoiceController::class, 'destroy'], $invoice) }}" onclick="return confirm('Está seguro que desea eliminar este elemento?')">
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
            {{-- {{ $invoices->links() }} --}}
        </div>
    </div>
@endsection