<ul class="nav">
    <li class="nav-item">
        <a class="nav-link" href="{{ action([\App\Http\Controllers\Backend\AdminController::class, 'index']) }}">
            <i class="nav-icon la la-lg la-dashboard"></i> Home
        </a>
    </li>
    <li class="nav-title">Administrador</li>
    
    <li class="nav-item nav-dropdown"><a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-lg la-user"></i> Usuarios</a>
        <ul class="nav-dropdown-items">
            <li class="nav-item"><a class="nav-link" href="{{ action([\App\Http\Controllers\Backend\UserController::class, 'create']) }}"><i class="nav-icon la la-lg la-puzzle"></i> Crear</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ action([\App\Http\Controllers\Backend\UserController::class, 'index']) }}"><i class="nav-icon la la-lg la-puzzle"></i> Editar</a></li>
        </ul>
    </li>
    
    <li class="nav-item nav-dropdown"><a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-lg la-tags"></i> Tags</a>
        <ul class="nav-dropdown-items">
            <li class="nav-item"><a class="nav-link" href="{{ action([\App\Http\Controllers\Backend\TagController::class, 'create']) }}"><i class="nav-icon la la-lg la-puzzle"></i> Crear</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ action([\App\Http\Controllers\Backend\TagController::class, 'index']) }}"><i class="nav-icon la la-lg la-puzzle"></i> Editar</a></li>
        </ul>
    </li>
    
    <li class="nav-item nav-dropdown"><a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-lg la-bank"></i> Categorías</a>
        <ul class="nav-dropdown-items">
            <li class="nav-item"><a class="nav-link" href="{{ action([\App\Http\Controllers\Backend\CategoryController::class, 'create']) }}"><i class="nav-icon la la-lg la-puzzle"></i> Crear</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ action([\App\Http\Controllers\Backend\CategoryController::class, 'index']) }}"><i class="nav-icon la la-lg la-puzzle"></i> Editar</a></li>
        </ul>
    </li>
    
    <li class="nav-item nav-dropdown"><a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-lg la-shopping-cart"></i> Productos</a>
        <ul class="nav-dropdown-items">
            <li class="nav-item"><a class="nav-link" href="{{ action([\App\Http\Controllers\Backend\ProductController::class, 'create']) }}"><i class="nav-icon la la-lg la-puzzle"></i> Crear</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ action([\App\Http\Controllers\Backend\ProductController::class, 'index']) }}"><i class="nav-icon la la-lg la-puzzle"></i> Editar</a></li>
        </ul>
    </li>

    <li class="nav-item nav-dropdown"><a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon fa-solid fa-file-invoice"></i> Facturas</a>
        <ul class="nav-dropdown-items">
            <li class="nav-item"><a class="nav-link" href="{{ action([\App\Http\Controllers\Backend\InvoiceController::class, 'create']) }}"><i class="nav-icon la la-lg la-puzzle"></i> Crear</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ action([\App\Http\Controllers\Backend\InvoiceController::class, 'index']) }}"><i class="nav-icon la la-lg la-puzzle"></i> Editar</a></li>
        </ul>
    </li>

    <li class="nav-item nav-dropdown"><a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-lg la-comments-o"></i> Comentarios</a>
        <ul class="nav-dropdown-items">
            {{-- <li class="nav-item"><a class="nav-link" href="{{ action([\App\Http\Controllers\Backend\CommentController::class, 'create']) }}"><i class="nav-icon la la-lg la-puzzle"></i> Crear</a></li> --}}
            <li class="nav-item"><a class="nav-link" href="{{ action([\App\Http\Controllers\Backend\CommentController::class, 'index']) }}"><i class="nav-icon la la-lg la-puzzle"></i> Editar</a></li>
        </ul>
    </li>

</ul>