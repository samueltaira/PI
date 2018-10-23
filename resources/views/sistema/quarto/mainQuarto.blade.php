@extends('sistema.padraoSistema.head')

@section('titulo', 'Mapa de Reserva')
<head>
    <style type="text/css">
        .flex-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .flex-colum-7 {
            width: 70%;
        }

        .flex-colum-3 {
            width: 30%;
        }
    </style>
</head>
@section('content')

    <br>
    @if(Session::has('status'))
        <div class="alert alert-success alert-dismissible" style=" width: 97%;margin-left: 20px; margin-right: 20px;
       font-size: 15px ">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fa fa-check"></i>Senha alterada com sucesso.
        </div>
    @endif

    <button type="button" class="btn btn-flat btn-info btn-sm" style=" width: 97%;margin-left: 20px; margin-right: 20px;
       font-size: 25px ">Reservar
    </button>


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Mapa dos Quartos
        </h1>
        <h4>
            <a href="">
                <i class="fa fa-filter">
                </i> Filtrar quartos
            </a>
        </h4>
    </section>

    <section class="content">
        <div class="row">
            @foreach($quartos as $quarto)
                <div class="col-sm-4">
                    <div class="small-box {{$quarto->status_reserva == 'vago' ? 'bg-green-active' : 'bg-red-active'}}">
                        <div style="justify-content: space-around; display: flex;" class="small-box-footer">
                                <div>
                                    <span style="width: 50%">
                                        <a href="#" style="color: inherit">
                                            <b>
                                                <i class="fa fa-pencil-square-o"></i> {{$quarto->nome}}
                                            </b>
                                        </a>
                                    </span>
                                </div>
                                <div>
                                    <span style="width: 25%">
                                           <b>
                                               <i class="fa fa-users"></i> {{$quarto->capacidade}}
                                           </b>
                                    </span>
                                </div>
                            <div>
                                    <span style="width: 25%">
                                           <b>
                                               Status: {{$quarto->status_reserva}}
                                           </b>
                                    </span>
                                </div>
                        </div>
                            <div>
                                <div class="flex-row-7">
                                    <span>
                                        <h5 style="margin-left: 3%; margin-bottom: 0;">
                                            Hóspede atual:
                                        </h5>
                                    </span>
                                </div>
                                <div class="flex-row">
                                    <div class="flex-colum-7">
                                        <span>
                                            <h4 style="margin-left: 5%;">Sem reserva ativa</h4>
                                        </span>
                                    </div>
                                    <div class="flex-colum-3">
                                        @if($quarto->status_reserva != "Reserva ativa")
                                            <a href="#" class="btn-sm" style="background: lightgray; color: black; margin-left: 8%;" >
                                                <i class="fa fa-play-circle"></i>
                                                Iniciar reserva
                                            </a>
                                        @else
                                            <a href="#" class="btn-sm" style="background: lightgray; color: black; margin-left: 8%;" >
                                                <i class="fa fa-play-circle"></i>
                                                Fechar reserva
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            <div class="row" style="margin-bottom: 10px">
                                <a href="#" class="btn-sm" style="background: lightgray; color: black; margin-left: 7%" >
                                    <i class="fa fa-cutlery"></i>
                                    Consumo
                                </a>
                            </div>
                        </div>
                        <a href="" class="small-box-footer">
                            <i class="fa fa-calendar"></i> Calendário - {{$quarto->nome}}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- jQuery 3 -->
    <script src="{{asset('/assets/js/jquery.min.js')}}"></script>
@endsection
