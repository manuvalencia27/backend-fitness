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

                    @isset($product)
                        <form method="post" action="{{ action([\App\Http\Controllers\Backend\ProductController::class, 'update'], $product) }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="_method" value="patch" />

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        <input class="form-control" name="name" id="name" type="text" placeholder="Ingrese un nombre para el tag" autocomplete="off" value="{{ $product->name }}">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Slug</label>
                                        <input class="form-control" name="slug" id="slug" type="text" placeholder="slug" autocomplete="off" value="{{ $product->slug }}">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Descripción corta</label>
                                        <input class="form-control" name="short_description" id="short_description" type="text" placeholder="Descripción corta" autocomplete="off" value="{{ $product->short_description }}">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Descripción</label>
                                        <textarea class="form-control" id="description" name="description" rows="9" placeholder=""> {{$product->description }} </textarea>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="regular_price">Precio</label>
                                        <div class="controls">
                                          <div class="input-prepend input-group">
                                            <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                            <input class="form-control" id="regular_price" name="regular_price" type="number" size="16" type="text" value="{{ $product->regular_price }}">
                                            <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                          </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="sale_price">Precio Oferta</label>
                                        <div class="controls">
                                          <div class="input-prepend input-group">
                                            <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                            <input class="form-control" id="sale_price" name="sale_price" type="number" size="16" type="text" value="{{ $product->sale_price }}">
                                            <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                          </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">SKU</label>
                                        <input class="form-control" name="SKU" id="SKU" type="text" placeholder="SKU" autocomplete="off" value="{{ $product->SKU }}">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Cantidad</label>
                                        <input class="form-control" name="quantity" id="quantity" type="text" placeholder="Cantidad de productos" autocomplete="off" value="{{ $product->id }}">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Stock</label>
                                        <select class="form-control" name="stock_status">
                                            <option value="">----Seleccionar----</option>
                                            <option value="instock"  @if($product->stock_status == 'instock') selected @endif>En stock</option>
                                            <option value="outofstock" @if($product->stock_status == 'outofstock') selected @endif>Sin stock</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Imágen</label>
                                        <input class="form-control" type="file" name="image" id="image">
                                    </div>
                                </div>
            
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Tags</label>
                                        <select class="form-control" name="tag_id">
                                            <option value="">----Seleccionar----</option>
                                            @foreach ($tags as $tag)
                                                @if ($product->tag)
                                                    <option value="{{ $tag->id }}" @if($product->tag->id == $tag->id) selected @endif>{{ $tag->name }}</option>
                                                @else
                                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Categoría</label>
                                        <select class="form-control" name="category_id">
                                            <option value="">----Seleccionar----</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" @if($product->category->id == $category->id) selected @endif>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <button class="btn btn-info" type="submit">Guardar</button>
                                </div>
                            </div>
                        </form>
                    @else
                        <form method="post" action="{{ action([\App\Http\Controllers\Backend\ProductController::class, 'store']) }}" enctype="multipart/form-data">
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
                                        <label for="name">Slug</label>
                                        <input class="form-control" name="slug" id="slug" type="text" placeholder="slug" autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Descripción corta</label>
                                        <input class="form-control" name="short_description" id="short_description" type="text" placeholder="Descripción corta" autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Descripción</label>
                                        <textarea class="form-control" id="description" name="description" rows="9" placeholder=""></textarea>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="regular_price">Precio</label>
                                        <div class="controls">
                                          <div class="input-prepend input-group">
                                            <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                            <input class="form-control" id="regular_price" name="regular_price" type="number" size="16" type="text">
                                            <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                          </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="sale_price">Precio Oferta</label>
                                        <div class="controls">
                                          <div class="input-prepend input-group">
                                            <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                            <input class="form-control" id="sale_price" name="sale_price" type="number" size="16" type="text">
                                            <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                          </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">SKU</label>
                                        <input class="form-control" name="SKU" id="SKU" type="text" placeholder="SKU" autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Cantidad</label>
                                        <input class="form-control" name="quantity" id="quantity" type="text" placeholder="Cantidad de productos" autocomplete="off">
                                    </div>
                                </div>
                                
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Stock</label>
                                        <select class="form-control" name="stock_status">
                                            <option value="">----Seleccionar----</option>
                                            <option value="instock">En stock</option>
                                            <option value="outofstock">Sin stock</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Imágen</label>
                                        <input class="form-control" type="file" name="image" id="image">
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
                                        <label for="name">Categoría</label>
                                        <select class="form-control" name="category_id">
                                            <option value="">----Seleccionar----</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
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