@extends('layouts.admin')


@section('contenido')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <strong>Facturas</strong>
                </div>
                <div class="card-body">
                    
                    @include('admin.modules.errors')

                    @isset($invoice)
                        <form method="post" action="{{ action([\App\Http\Controllers\Backend\InvoiceController::class, 'update'], $invoice) }}">
                            @csrf

                            <input type="hidden" name="_method" value="patch" />

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Usuario</label>
                                        <select class="form-control" name="user_id">
                                            <option value="">----Seleccionar----</option>
                                            @foreach ($users as $user)
                                                @if ($invoice->user)
                                                    <option value="{{ $user->id }}" @if($invoice->user->id == $user->id) selected @endif>{{ $user->name }}</option>
                                                @else
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Cédula</label>
                                        <input class="form-control" name="cc" id="cc" type="number" placeholder="Cédula" autocomplete="off" value="{{ $invoice->cc }}">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Nro. Tarjeta</label>
                                        <input class="form-control" name="tc" id="tc" type="number" placeholder="Nro. Tarjeta" autocomplete="off" value="{{ $invoice->tc }}">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">CVC</label>
                                        <input class="form-control" name="cvc" id="cvc" type="number" placeholder="CVC" autocomplete="off" value="{{ $invoice->cvc }}">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="date-input">Fecha de vencimiento</label>
                                        <input class="form-control" id="fecha_vencimiento" value="{{ $invoice->fecha_vencimiento }}" type="date" name="fecha_vencimiento" placeholder="date"><span class="help-block"></span>
                                      </div>
                                </div>
                                
                                <div class="col-sm-12">
                                    <button class="btn btn-info" type="submit">Guardar</button>
                                </div>
                            </div>
                        </form>
                    @else
                        <form method="post" action="{{ action([\App\Http\Controllers\Backend\InvoiceController::class, 'store']) }}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Usuario</label>
                                        <select class="form-control" name="user_id">
                                            <option value="">----Seleccionar----</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Cédula</label>
                                        <input class="form-control" name="cc" id="cc" type="number" placeholder="Cédula" autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Nro. Tarjeta</label>
                                        <input class="form-control" name="tc" id="tc" type="number" placeholder="Nro. Tarjeta" autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">CVC</label>
                                        <input class="form-control" name="cvc" id="cvc" type="number" placeholder="CVC" autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="date-input">Fecha de vencimiento</label>
                                        <input class="form-control" id="fecha_vencimiento" type="date" name="fecha_vencimiento" placeholder="date"><span class="help-block"></span>
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