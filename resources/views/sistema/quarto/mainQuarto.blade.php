@extends('sistema.padraoSistema.head')
@section('titulo', 'Mapa de Reserva')
@section('content')
    <br>
    @if(Session::has('status'))
        <div class="alert alert-success alert-dismissible" style=" width: 97%;margin-left: 20px; margin-right: 20px;
   font-size: 15px ">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fa fa-check"></i>Senha alterada com sucesso.
        </div>
    @endif
    <a href="{{route('core.nova.reserva')}}">
        <button type="button" class="btn btn-flat btn-info btn-sm"
            style=" width: 97%;margin-left: 20px; margin-right: 20px;font-size: 25px ">
        Realizar uma Reserva
        </button>
    </a>
    <section class="content-header">
        <h1>
            Mapa dos Quartos atualmente
        </h1>
        {{--<h4>--}}
            {{--<a href="">--}}
                {{--<i class="fa fa-filter">--}}
                {{--</i> Filtrar quartos--}}
            {{--</a>--}}
        {{--</h4>--}}
    </section>
    {{--{{dd($tudo)}}--}}
    <section class="content">
        <div class="row">
            @forelse($tudo as $reserva)
                <div class="col-sm-4">
                    <div class="small-box
                        {{$reserva->status == 'Iniciada' ? 'bg-green-active' : 'bg-yellow-active'}}
                    ">
                        <div style="justify-content: space-around; display: flex;" class="small-box-footer">
                            <div>
                            <span title="Nome do Quarto" style="width: 50%">
                                <b>
                                    <i class="fa fa-bed"></i> {{$reserva->quarto->nomeQuarto}}
                                </b>
                            </span>
                            </div>
                            <div>
                            <span title="Capacidade do Quarto" style="width: 25%">
                               <b>
                                   <i class="fa fa-users"></i> {{$reserva->quarto->capacidade}}
                               </b>
                            </span>
                            </div>
                            <div>
                            <span style="width: 25%">
                               <b>
                                   Status da Reserva: {{$reserva->status}}
                               </b>
                            </span>
                            </div>
                        </div>
                        <div>
                            <div class="flex-row">
                                <div class="flex-colum-7">
                                    <span>
                                        <h5 style="margin-left: 3%; margin-bottom: 0;">
                                            Hóspede atual:
                                        </h5>
                                    </span>
                                </div>
                                <div class="flex-colum-3">
                                    Fim Reserva:
                                </div>
                            </div>
                            <div class="flex-row">
                                <div class="flex-colum-7">
                                    <span>
                                        <h4 style="margin-left: 5%;">
                                            {{$reserva->hospede->nome}}
                                        </h4>
                                    </span>
                                </div>
                                <div class="flex-colum-3">
                                    {{$reserva->fimReserva}}
                                </div>
                            </div>
                            <div class="flex-row" style="margin-bottom: 10px">
                                <div class="flex-colum-3">
                                    @if($reserva->status != "Iniciada")
                                        <a onclick="confirm('Você quer iniciar a reserva?')" title="Iniciar Reserva" href="{{route('ativa.reserva', $reserva->id)}}" class="btn-sm"
                                            style="background: lightgray; color: black; margin-left: 8%;">
                                            <i class="fa fa-play-circle"></i> Iniciar reserva
                                        </a>
                                    @else
                                        <a onclick="confirm('Você quer finalizar esta reserva?')" href="{{route('fecha.reserva', $reserva->id)}}" class="btn-sm"
                                           style="background: lightgray; color: black; margin-left: 8%;">
                                            <i class="fa fa-play-circle"></i> Fechar reserva
                                        </a>
                                    @endif
                                </div>
                                {{--<div class="flex-column-7">--}}
                                    {{--<a title="Gerenciar consumo" href="#" class="btn-sm" style="background: lightgray; color: black; margin-right: 33%">--}}
                                        {{--<i class="fa fa-cutlery"></i> Consumo--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            </div>
                        </div>
                        <div class="small-box-footer"></div>
                    </div>

                </div>
            @empty
                <button type="button" class="btn btn-flat btn-default btn-sm"
                        style=" width: 97%;margin-left: 20px; margin-right: 20px;font-size: 25px;">
                    Ops, você não possui reservas para hoje!
                </button>
            @endforelse
        </div>
    </section>
    <!-- jQuery 3 -->
    <script src="{{asset('/assets/js/jquery.min.js')}}"></script>
@endsection
