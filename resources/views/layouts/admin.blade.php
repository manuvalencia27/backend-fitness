<!DOCTYPE html>
<html lang="en">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="Backstrap - Open Source Bootstrap 4 Admin Template on top of CoreUI">
    <meta name="author" content="Cristian Tabacitu">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard,CoreUI">
    <title>Panel Administrativo SportFitnes</title>
    <!-- Icons-->
    <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" />
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="{{ asset('admin-assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-assets/css/pace.min.css') }}" rel="stylesheet">
</head>
<body class="app aside-menu-fixed sidebar-lg-show">
<header class="app-header bg-light border-0 navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto ml-3" type="button" data-toggle="sidebar-show"><span class="navbar-toggler-icon"></span></button><a class="navbar-brand" href="#"><b>Back</b><span>strap</span></a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show"><span class="navbar-toggler-icon"></span></button>
    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item dropdown"><a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><img class="img-avatar" src="{{ asset('assets/imgs/page/avatar-8.jpg') }}" alt="{{ Auth::user()->name }}"></a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header text-center"><strong>{{ Auth::user()->name }}</strong></div>
                <div class="dropdown-header text-center"><strong>Config</strong></div><a class="dropdown-item" href="{{ action([\App\Http\Controllers\Backend\UserController::class, 'edit'] , Auth::user()->id) }}"><i class="fa fa-user"></i> Perfil</a>
                <div class="dropdown-divider"></div><a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                    <i class="fa fa-lock"></i> Logout</a>
                </a><form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
    <button class="navbar-toggler aside-menu-toggler d-md-down-none" type="button" data-toggle="aside-menu-lg-show"><span class="navbar-toggler-icon"></span></button>
    <button class="navbar-toggler aside-menu-toggler d-lg-none mr-3" type="button" data-toggle="aside-menu-show"><span class="navbar-toggler-icon"></span></button>
</header>
<div class="app-body">
    <div class="sidebar sidebar-pills bg-transparent">
        <nav class="sidebar-nav">
            @include('admin.includes.menu')
        </nav>
    </div>
    <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
            <!-- Breadcrumb Menu-->
        </ol>
        <div class="container-fluid">
            <div class="animated fadeIn"></div>

            @yield('contenido')

        </div>
    </main>
    <aside class="aside-menu">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#messages" role="tab"><i class="icon-speech"></i></a></li>
        </ul>
        <!-- Tab panes-->
        <div class="tab-content">
            <div class="tab-pane active p-3" id="messages" role="tabpanel">
                <div class="message">
                    <div class="py-3 pb-5 mr-3 float-left">
                        <div class="avatar"><img class="img-avatar" src="img/avatars/7.jpg" alt="admin@bootstrapmaster.com"><span class="avatar-status badge-success"></span></div>
                    </div>
                    <div><small class="text-muted">Lukasz Holeczek</small><small class="text-muted float-right mt-1">1:52 PM</small></div>
                    <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div><small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</small>
                </div>
                <hr>
                <div class="message">
                    <div class="py-3 pb-5 mr-3 float-left">
                        <div class="avatar"><img class="img-avatar" src="img/avatars/7.jpg" alt="admin@bootstrapmaster.com"><span class="avatar-status badge-success"></span></div>
                    </div>
                    <div><small class="text-muted">Lukasz Holeczek</small><small class="text-muted float-right mt-1">1:52 PM</small></div>
                    <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div><small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</small>
                </div>
                <hr>
                <div class="message">
                    <div class="py-3 pb-5 mr-3 float-left">
                        <div class="avatar"><img class="img-avatar" src="img/avatars/7.jpg" alt="admin@bootstrapmaster.com"><span class="avatar-status badge-success"></span></div>
                    </div>
                    <div><small class="text-muted">Lukasz Holeczek</small><small class="text-muted float-right mt-1">1:52 PM</small></div>
                    <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div><small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</small>
                </div>
                <hr>
                <div class="message">
                    <div class="py-3 pb-5 mr-3 float-left">
                        <div class="avatar"><img class="img-avatar" src="img/avatars/7.jpg" alt="admin@bootstrapmaster.com"><span class="avatar-status badge-success"></span></div>
                    </div>
                    <div><small class="text-muted">Lukasz Holeczek</small><small class="text-muted float-right mt-1">1:52 PM</small></div>
                    <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div><small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</small>
                </div>
                <hr>
                <div class="message">
                    <div class="py-3 pb-5 mr-3 float-left">
                        <div class="avatar"><img class="img-avatar" src="img/avatars/7.jpg" alt="admin@bootstrapmaster.com"><span class="avatar-status badge-success"></span></div>
                    </div>
                    <div><small class="text-muted">Lukasz Holeczek</small><small class="text-muted float-right mt-1">1:52 PM</small></div>
                    <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div><small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</small>
                </div>
            </div>
        </div>
    </aside>
</div>
<!-- CoreUI and necessary plugins-->
<script src="{{ asset('admin-assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin-assets/js/popper.min.js') }}"></script>
<script src="{{ asset('admin-assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin-assets/js/pace.min.js') }}"></script>
<script src="{{ asset('admin-assets/js/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('admin-assets/js/coreui.min.js') }}"></script>
<script>
    PNotify.defaults.styling = 'bootstrap4';
</script>
</body>
</html>