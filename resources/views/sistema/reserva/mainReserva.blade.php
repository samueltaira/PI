@extends('sistema.padraoSistema.head')
@section('titulo', 'Reserva')
@section('content')
    <section class="content-header">
        <div>
            <h1>
                Gerenciamento de Reservas
            </h1>
        </div>
        @if(Session::has('message_cancelado'))
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fa fa-check"></i>Reserva cancelada com sucesso
            </div>
        @endif
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Reservas abertas</h3>
            </div>
            <div class="box-body">
                <div class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <form action="" method="GET">
                            <div class="col-sm-3">
                                <div id="filtro" class="dataTables_filter">
                                    <label>Procurar:
                                        <input type="search" class="form-control input-sm"
                                               placeholder="Procure pelo nome"
                                               size="20%" name="valorPesquisado">
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <button class="btn btn-success" type="submit">Pesquisar</button>
                            </div>
                        </form>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered table-striped dataTable">
                                <thead>
                                    <tr role="row">
                                        <th>ID</th>
                                        <th>Check In</th>
                                        <th>Check Out</th>
                                        <th>Hospede</th>
                                        <th>Quarto</th>
                                        <th>Ação</th>
                                      </tr>
                                </thead>
                                <tbody>
                                {{--{{dd($reservas)}}--}}
                                @forelse($reservas as $reserva)
                                    <tr role="row">
                                        <td>
                                            {{$reserva->id}}
                                        </td>
                                        <td>
                                            {{date('d-m-Y', strtotime($reserva->inicioReserva))}}
                                        </td>
                                        <td>
                                            {{date('d-m-Y', strtotime($reserva->fimReserva))}}
                                        </td>
                                        <td>
                                            {{$reserva->hospede->nome}}
                                        </td>
                                        <td>
                                            {{$reserva->quarto->nomeQuarto}}
                                        </td>
                                        <td>
                                            <a title="Edição reserva desabilitado" class="btn btn-flat btn-warning"
                                               href="#">
                                                {{--<i class="fa fa-fw fa-edit"></i>--}}
                                            </a>
                                            <a onclick="return confirm('Quer realmente cancelar esta reserva?')" href="{{route('core.cancela.reserva', $reserva->id)}}"
                                               title="Cancelar Reserva" class="btn btn-flat btn-danger">
                                                <i class="fa fa-w fa-window-close"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr role="row">
                                        <td>
                                            Nenhuma reserva no momento.
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                                {{$reservas -> links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--Canceladas--}}

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Reservas canceladas e fechadas</h3>
            </div>
            <div class="box-body">
                <div class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <form action="" method="GET">
                            <div class="col-sm-3">
                                <div id="filtro" class="dataTables_filter">
                                    <label>Procurar:
                                        <input type="search" class="form-control input-sm"
                                               placeholder="Procure pelo nome"
                                               size="20%" name="valorPesquisado">
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <button class="btn btn-success" type="submit">Pesquisar</button>
                            </div>
                        </form>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered table-striped dataTable">
                                <thead>
                                <tr role="row">
                                    <th>ID</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th>Hospede</th>
                                    <th>Quarto</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($reservasAlteradas as $reservaAlterada)
                                    <tr role="row">
                                        <td>
                                            {{$reservaAlterada->id}}
                                        </td>
                                        <td>
                                            {{date('d-m-Y', strtotime($reservaAlterada->inicioReserva))}}
                                        </td>
                                        <td>
                                            {{date('d-m-Y', strtotime($reservaAlterada->fimReserva))}}
                                        </td>
                                        <td>
                                            {{$reservaAlterada->hospede->nome}}
                                        </td>
                                        <td>
                                            {{$reservaAlterada->quarto->nomeQuarto}}
                                        </td>
                                        <td>
                                            {{$reservaAlterada->status}}
                                        </td>
                                    </tr>
                                @empty
                                    <tr role="row">
                                        <td>
                                            Nenhuma reserva no momento.
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                                {{$reservasAlteradas-> links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection
