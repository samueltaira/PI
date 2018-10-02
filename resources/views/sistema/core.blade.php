@extends('sistema.padraoSistema.head')

@section('titulo', 'Mapa de Reserva')

@section('content')

    <br>
    <button type="button" class="btn btn-flat btn-info btn-sm" style=" width: 97%;margin-left: 20px; margin-right: 20px;
       font-size: 25px ">Reservar
    </button>


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Mapa dos Quartos
        </h1>
        <h4><a href=""><i class="fa fa-filter"></i> Filtrar quartos </a></h4>
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
    </section>
    <!-- jQuery 3 -->
    <script src="{{asset('/assets/js/jquery.min.js')}}"></script>
@endsection
