@extends('sistema.padraoSistema.head')
@section('titulo', 'Reserva')
@section('content')
    <section class="content-header">
        <div>
            <h1>
                Reserva
            </h1>
        </div>
        {{--@if(Session::has('message'))--}}
            {{--<div class="alert alert-success alert-dismissible">--}}
                {{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>--}}
                {{--<i class="icon fa fa-check"></i>Hóspede cadastrado com sucesso.--}}
            {{--</div>--}}
        {{--@endif--}}
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Reservas</h3>
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
                                            {{$reserva->nome}}
                                        </td>
                                        <td>
                                            {{$reserva->nomeQuarto}}
                                        </td>
                                        <td>
                                            <a title="Editar Reserva" class="btn btn-flat btn-warning"
                                               href="">
                                                <i class="fa fa-fw fa-edit"></i>
                                            </a>
                                            <a title="Excluir Reserva" class="btn btn-flat btn-danger">
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
                                {{--{{$hospedes -> links()}}--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection
