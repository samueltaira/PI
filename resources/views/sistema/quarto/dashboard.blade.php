@extends('sistema.padraoSistema.head')
@section('titulo', 'Mapa de Reserva')
@section('content')
    <br>
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
    </section>
    <section class="content">
        <h4>Reservas</h4>
        <div class="col-md-4">
            <div class="info-box bg-blue col-md-3">
                <span class="info-box-icon"><i class="fa fa-bed"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Reservas realizadas</span>
                    <span class="info-box-number">18</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <span class="progress-description">
                    Dados do mês atual
                  </span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="info-box bg-green col-md-3">
                <span class="info-box-icon"><i class="fa fa-bed"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Reservas concluídas</span>
                    <span class="info-box-number">6</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 20%"></div>
                    </div>
                    <span class="progress-description">
                    Dados do mês atual
                  </span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="info-box bg-red">
                <span class="info-box-icon"><i class="fa fa-bed"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Reservas canceladas</span>
                    <span class="info-box-number">12</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <span class="progress-description">
                    Dados do mês atual
                  </span>
                </div>
            </div>
        </div>

        <h4>Check-ins e Check-outs</h4>
        <div class="col-md-6">
            <div class="info-box bg-green col-md-3">
                <span class="info-box-icon"><i class="fa fa-sign-in"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Check-ins concluídos este mês</span>
                    <span class="info-box-number">4</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 20%"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info-box bg-red col-md-3">
                <span class="info-box-icon"><i class="fa fa-sign-out"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Check-outs concluídos este mês</span>
                    <span class="info-box-number">13</span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 70%"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- jQuery 3 -->
    <script src="{{asset('/assets/js/jquery.min.js')}}"></script>
@endsection
