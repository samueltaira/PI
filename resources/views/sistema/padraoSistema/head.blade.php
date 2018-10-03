<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('titulo')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('/assets/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    {{--<link rel="stylesheet" href="{{asset('/assets/css/font-awesome.min.css')}}">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('/assets/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/assets/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('/assets/css/_all-skins.min.css')}}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{asset('/assets/css/morris.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('/assets/css/jquery-jvectormap.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset('/assets/css/bootstrap-datepicker.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('/assets/css/daterangepicker.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('/assets/css/bootstrap3-wysihtml5.min.css')}}">
    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- jQuery 3 -->
    <script src="{{asset('/assets/js/jquery.min.js')}}"></script>
</head>


<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->

        <a href="" class="logo" style="padding-right: 20px">
            C o n t r o lH o t e l
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown notifications-menu">
                        <a href="{{route('sistema.login.sair')}}" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-sign-in"></i>
                            <span class="label label-danger">1</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">Check-in hoje: 1</li>
                            <li>
                                <a>
                                    <i class="fa fa-bed text-green"></i>
                                    Quarto 102 - Check-in: 14:00
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-sign-out"></i>
                            <span class="label label-danger">1</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">Check-out hoje: 1</li>
                            <li>
                                <a>
                                    <i class="fa fa-bed text-red"></i>
                                    Quarto 101 - Check-out: 12:00
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{!! asset('/images/teste.jpg') !!}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{Auth::user()->nome}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{!! asset('/images/teste.jpg') !!}" class="img-circle" alt="User Image">

                                <p>
                                    {{Auth::user()->hotel}}
                                    <small>{{Auth::user()->email}}</small>
                                </p>
                            </li>

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="" class="btn btn-default btn-flat">Perfil</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{route('sistema.login.sair')}}" class="btn btn-default btn-flat">Sair</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Procurar clientes.">
                    <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>

            <ul class="sidebar-menu" data-widget="tree">
                <li class="treeview" id="Mapa">
                    <a href="">
                        <i class="fa fa-map-o"></i>
                        <span>
                            Map Room
                        </span>
                        <span class="pull-right-container">
                            <span class="label label-primary pull-right"></span>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{route('sistema.home')}}">
                                <i class="fa fa-map"></i> Mapa dos Quartos
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa fa-plus"></i> Adicionar Quarto
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="treeview" id="Hospede">
                    <a href="">
                        <i class="fa fa-address-book-o"></i>
                        <span>Clientes</span>
                        <span class="pull-right-container">
                            <span class="label label-primary pull-right"></span>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{route('sistema.main.hospedes')}}">
                                <i class="fa fa-group"></i> Hóspedes
                            </a>
                        </li>
                        <li>
                            <a href="{{route('sistema.cadastra.hospedes')}}">
                                <i class="fa fa-plus"></i> Registrar
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                        <span class="pull-right-container">
                                    <span class="label label-primary pull-right"></span>
                                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="">
                                <i class="fa fa-line-chart"></i> Gráficos
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="">
                        <i class="fa fa-user-o"></i>
                        <span>Perfil</span>
                        <span class="pull-right-container">
                            <span class="label label-primary pull-right"></span>
                        </span>
                    </a>

                    <ul class="treeview-menu">
                        <li>
                            <a href="">
                                <i class="fa fa-cogs"></i> Configurações
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa fa-user-plus"></i> Adicionar mais atendentes
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </section>
    </aside>

    <div class="content-wrapper">
        @yield  ('content')
    </div>
</div>
</body>


@include('sistema.padraoSistema.footer')
