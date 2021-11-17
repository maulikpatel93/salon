<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-token" content="_token">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- plugin css-->
    <link href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('plugins/dependent-dropdown/css/dependent-dropdown.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css">
    @yield('pluginsCss')
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('plugins/sweetalert2/css/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
    <!-- common script-->
    <script src="{{ asset('js/jquery.js') }}" type="text/javascript"></script>
    @stack('after-styles')
</head>

<body class="hold-transition layout-fixed layout-navbar-fixed sidebar-mini-lg">
    @auth
    <!-- /.navbar -->
    <!-- Site wrapper -->
    <div class="wrapper">
        @include('layouts.loader')
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="" class="nav-link">Home</a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-bs-toggle="dropdown" href="#">
                        <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <span class="dropdown-header fw-bold">{{ $user->first_name.' '.$user->last_name
                            }}</span>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt mr-2"></i> {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="" class="brand-link">
                <img src="{{ url('/img/AdminLTELogo.png') }}" alt="" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ url('/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="">
                    </div>
                    <div class="info">
                        <a href="" class="d-block">{{ $user->first_name.' '.$user->last_name }}</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <button class="input-group-text btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    User Management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.modules.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Modules</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.permissions.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Permission</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.roles.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Roles</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Users</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @yield('breadcrumb')
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    @yield('modal')
    {{-- @include('grid_view::modal.container') --}}
    <!-- ./wrapper -->
    @stack('before-scripts')
    <!-- common js -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.form.min.js') }}" defer></script>
    <script src="{{ asset('js/AdminLTE.js') }}" type="text/javascript"></script>
    <!-- plugin js -->
    <script type="text/javascript" src="{{ asset('plugins/jsvalidation/jsvalidation.js')}}"></script>
    <script src="{{ asset('plugins/dependent-dropdown/js/dependent-dropdown.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/jquery-pjax/jquery.pjax.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/sweetalert2/js/sweetalert2.all.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/handlebars/handlebars.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
    @yield('pluginsJs')
    <!-- script js -->
    <script src="{{ asset('js/cloneData.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/grid.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/sweetalert2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/demo.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/myfunction.js') }}" type="text/javascript"></script>
    @stack('after-scripts')
    @yield('pagescript')
    @endauth
    <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    </script>
    @stack('grid_js')  
</body>

</html>
