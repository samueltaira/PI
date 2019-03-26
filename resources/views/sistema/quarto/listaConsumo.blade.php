@extends('sistema.padraoSistema.head')
@section('titulo', 'Quartos')
@section('content')
    <div>

        <section class="content-header">
            <h1>
                Resumo
            </h1>
        </section>
        <br>

        <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Consumo</h3>
            </div>
            <div class="box-body">
                <div class="dataTables_wrapper form-inline dt-bootstrap">
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered table-striped dataTable" role="grid">
                                <thead>
                                <tr>
                                    <th style="text-align:center">Item</th>
                                    <th style="text-align:center">Quantidade</th>
                                    <th style="text-align:center">Valor Unitário</th>
                                    <th style="text-align:center">Ação</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($consumo as $item)
                                    <tr>
                                        <td style="text-align:center">{{$item->item}}</td>
                                        <td style="text-align:center">{{$item->quantidade}}</td>
                                        <td style="text-align:center">R$ {{$item->valor}}</td>
                                        <td style="text-align:center">
                                            <a href="#">
                                                <i class="icon fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr role="row" class="odd">
                                        <td colspan="4" align="center"><b>Nenhum item consumido</b>
                                        </td>
                                    </tr>
                                @endforelse
                                <tr>
                                    <th style="text-align:center" colspan="4">Valor total: R$ {{$total}}</th>
                                </tr>
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <a href="{{route('fecha.reserva', $reserva_id)}}" onclick="return confirm('Você quer finalizar esta reserva?')" title="Fechar Reserva">
            <button type="button" class="btn btn-flat btn-info active btn-sm" style=" width: 97%;margin-left: 20px; margin-right: 20px;font-size: 25px ">
                <i class="fa fa-window-close"></i> Fechar reserva
            </button>
        </a>
        <br><br>
        <a href="{{url()->previous()}}" title="Voltar">
            <button type="button" class="btn btn-flat btn-default active btn-sm" style=" width: 97%;margin-left: 20px; margin-right: 20px;font-size: 25px ">
            <i class="fa fa-caret-square-o-left"></i> Voltar
            </button>
        </a>

    </div>
@endsection