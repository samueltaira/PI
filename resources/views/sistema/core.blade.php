
@extends('sistema.padraoSistema.head')

@section('titulo', 'Mapa de Reserva')



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
            <a href="" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-sign-in"></i>
              <span class="label label-danger">1</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Check-in hoje: 1</li>  <li>
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
                <img src="{!! asset('../images/teste.jpg') !!}" class="user-image" alt="User Image">
              <span class="hidden-xs">Hotel Penha</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{!! asset('../images/teste.jpg') !!}" class="img-circle" alt="User Image">

                <p>
                  Hotel Penha
                  <small>Penha-SC</small>
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="{{url('/')}}" class="btn btn-default btn-flat">Sign out</a>
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
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
        <img src="{!! asset('../images/teste.jpg') !!}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Hotel Penha</p>
          <a href=""><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Procurar clientes...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">



        <li class="active treeview">
          <a href="">
            <i class="fa fa-map-o"></i>
            <span>Map Room</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-plus"></i> Adicionar Quarto</a></li>
            <li><a href=""><i class="fa fa-filter"></i> Filtrar</a></li>
              <li><a href=""><i class="fa fa-minus"></i> Inativar Quarto</a></li>
          </ul>
        </li>

          <li class="treeview">
              <a href="">
                  <i class="fa fa-address-book-o"></i>
                  <span>Clientes</span>
                  <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="#registroClienteModal" data-toggle="modal" data-target="#registroClienteModal" ><i class="fa fa-plus"></i> Registrar</a></li>
                  <li><a href=""><i class="fa fa-edit"></i> Editar</a></li>
                  <li><a href=""><i class="fa fa-list"></i> Listar</a></li>
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

          </li>

          <li class="treeview">
              <a href="">
                  <i class="fa fa-user-o"></i>
                  <span>Perfil</span>
                  <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
              </a>
          </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
      <button type="button" class="btn btn-flat btn-info btn-sm" style=" width: 97%;margin-left: 20px; margin-right: 20px;
       font-size: 25px ">Reservar</button>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Map Room
        <small>Quartos</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">



      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>Room 101</h3>

              <p>Quarto 101</p>
            </div>
            <div class="icon">
              <i class="fa fa-bed"></i>
            </div>
            <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>Room 102</h3>

                    <p>Quarto 102</p>
                </div>
                <div class="icon">
                    <i class="fa fa-bed"></i>
                </div>
                <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
          <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                  <div class="inner">
                      <h3>Room 103</h3>

                      <p>Quarto 103</p>
                  </div>
                  <div class="icon">
                      <i class="fa fa-bed"></i>
                  </div>
                  <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
          </div>

          <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                  <div class="inner">
                      <h3>Room 104</h3>

                      <p>Quarto 104</p>
                  </div>
                  <div class="icon">
                      <i class="fa fa-bed"></i>
                  </div>
                  <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
          </div>

          <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                  <div class="inner">
                      <h3>Room 201</h3>

                      <p>Quarto 201</p>
                  </div>
                  <div class="icon">
                      <i class="fa fa-bed"></i>
                  </div>
                  <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
          </div>

          <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                  <div class="inner">
                      <h3>Room 202</h3>

                      <p>Quarto 202</p>
                  </div>
                  <div class="icon">
                      <i class="fa fa-bed"></i>
                  </div>
                  <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
          </div>

          <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                  <div class="inner">
                      <h3>Room 203</h3>

                      <p>Quarto 203</p>
                  </div>
                  <div class="icon">
                      <i class="fa fa-bed"></i>
                  </div>
                  <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
          </div>

          <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                  <div class="inner">
                      <h3>Room 204</h3>

                      <p>Quarto 204</p>
                  </div>
                  <div class="icon">
                      <i class="fa fa-bed"></i>
                  </div>
                  <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
          </div>

          <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                  <div class="inner">
                      <h3>Room 301</h3>

                      <p>Quarto 301</p>
                  </div>
                  <div class="icon">
                      <i class="fa fa-bed"></i>
                  </div>
                  <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
          </div>

          <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                  <div class="inner">
                      <h3>Room 302</h3>

                      <p>Quarto 302</p>
                  </div>
                  <div class="icon">
                      <i class="fa fa-bed"></i>
                  </div>
                  <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
          </div>

      </div>

      <!-- /.row -->

        <br><br><br>
         <!-- Calendar -->

          <div class="box box-solid bg-blue"  style="width: 50%">
            <div class="box-header">
              <i class="fa fa-calendar"></i>

              <h3 class="box-title">Calendar</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <!-- button with a dropdown -->
                <div class="btn-group">
                  <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bars"></i></button>
                  <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="">Add new event</a></li>
                    <li><a href="">Clear events</a></li>
                    <li class="divider"></li>
                    <li><a href="">View calendar</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
            </div>

          </div>
        </section>
      </div>
  </div>


@include('sistema.padraoSistema.footer')




<!-- Modal de registro de Cliente -->

<div class="modal fade" id="registroClienteModal" tabindex="-1" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cadastrar Cliente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="">
                    <input type="hidden" id="id" name="id" value="">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-6">
                                <label for="nome" class="col-form-label">Nome:</label>
                                <input type="text" class="form-control" id="nome" name="nome">
                            </div>

                            <div class="col-md-6">
                                <label for="documento" class="col-form-label">Documento:</label>
                                <input type="text" maxlength="11" placeholder="Ex.: xxxxxxxxxxx" class="form-control" id="documento" name="documento">
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-8">
                                <label for="email" class="col-form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>

                            <div class="col-md-4">
                                <label for="telefone" class="col-form-label">Telefone:</label>
                                <input type="tel" class="form-control" id="telefone" name="telefone">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-8">
                                <label for="cidade" class="col-form-label">Cidade:</label>
                                <input type="text" class="form-control" id="cidade" name="cidade">
                            </div>

                            <div class="col-md-4">
                                <label for="estado" class="col-form-label">Estado:</label>
                                <input type="text" maxlength="11" class="form-control" id="estado" name="estado">
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>



</body>
</html>