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
        <button type="button" class="btn btn-flat btn-warning active btn-sm"
                style=" width: 97%;margin-left: 20px; margin-right: 20px;font-size: 25px ">
            Realizar uma Reserva
        </button>
    </a>
    @if(Session::has('Mensagem'))
        <br><div class="alert alert-success alert-dismissible" style=" width: 97%;margin-left: 20px; margin-right: 20px;
   font-size: 15px ">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fa fa-check"></i>Item adicionado com sucesso!!
        </div>
    @endif
    <section class="content-header">
        <h1>
            Reservas de hoje
        </h1>
    </section>
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
                                        <a onclick="return confirm('Você quer iniciar a reserva?')" title="Iniciar Reserva" href="{{route('ativa.reserva', $reserva->id)}}" class="btn-sm"
                                            style="background: lightgray; color: black; margin-left: 8%;">
                                            <i class="fa fa-play-circle"></i> Iniciar reserva
                                        </a>
                                    @else
                                        <a onclick="return confirm('Você quer finalizar esta reserva?')"
                                        href="{{route('fecha.reserva', $reserva->id)}}" class="btn-sm"
                                           style="background: lightgray; color: black; margin-left: 8%;">
                                            <i class="fa fa-play-circle"></i> Fechar reserva
                                        </a>
                                    @endif
                                </div>
                                @if($reserva->status == "Iniciada")
                                <div class="flex-column-3">
                                    <button type="button" id="adicionarConsumo" title="Adicionar consumo" class="btn-sm" style="background: lightgray; color: black;"
                                    data-reserva_id="{{$reserva->id}}" data-nome_quarto="{{$reserva->quarto->nomeQuarto}}" data-toggle="modal" data-target="#modalExemplo2">
                                       <i class="fa fa-cutlery"></i> Add item
                                    </button>
                                </div>
                                <div class="flex-column-3" style="margin-right:3%">
                                    <button title="Listar consumo" href="#" class="btn-sm" style="background: lightgray; color: black;"
                                    data-toggle="modal" data-target="#modalExemplo">
                                       <i class="fa fa-list"></i> List item
                                    </button>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="small-box-footer"></div>
                    </div>

                </div>
            @empty
                <div class="alert btn-flat btn-default btn-sm"
                        style="text-align:center; width: 97%;margin-left: 20px; margin-right: 20px;font-size: 25px;">
                    Ops, você não possui reservas para hoje!
                </div>
            @endforelse
        </div>
    </section>

    <!-- Modal listar consumo -->
    <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Consumo - Quarto 202</h4>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="text-align:center">Item</th>
                                <th style="text-align:center">Quantidade</th>
                                <th style="text-align:center">Valor Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align:center">Chocolate</td>
                                <td style="text-align:center">2</td>
                                <td style="text-align:center">R$ 10,50</td>
                            </tr>
                            <tr>
                                <th style="text-align:center" colspan="3">Valor Total: R$ 10,50</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

     <!-- Modal adicionar consumo -->
     <div class="modal fade" id="modalExemplo2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="quartoReserva">Consumo do quarto -</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('testex')}}">
                    {{csrf_field()}}
                        <input type="hidden" name="reserva_id" id="reserva_id">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Nome do Item</label>
                                <input type="text" class="form-control" name="item" id="item">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Quantidade</label>
                                <input type="number" name="quantidade" class="form-control" id="quantidade">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Valor do Item</label>
                                <input type="money" class="form-control" name="valor" id="valor">
                            </div>
                            </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Adicionar</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- jQuery 3 -->
    <script src="{{asset('/assets/js/jquery.min.js')}}"></script>

        <script>
           $(function() {
                $(document).on('show.bs.modal','#modalExemplo2', function(event) {
                var button = $(event.relatedTarget);
                var recipient = button.data('reserva_id');
                var recipient2 = button.data('nome_quarto');
                var modal = $(this);
                modal.find('.modal-body #reserva_id').val(recipient);
                
                // alert(recipient);
                // alert(recipient2);
            });
        });
        </script>


@endsection
