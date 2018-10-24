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
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible" style=" width: 97%;margin-left: 20px; margin-right: 20px;
       font-size: 15px ">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fa fa-check"></i>Quarto cadastrado com sucesso.
        </div>
    @elseif(Session::has('message_inative'))
        <div class="alert alert-warning alert-dismissible" style=" width: 97%;margin-left: 20px; margin-right: 20px;
       font-size: 15px ">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fa fa-check"></i>Quarto inativado com sucesso.
        </div>
    @elseif(Session::has('message_active'))
        <div class="alert alert-success alert-dismissible" style=" width: 97%;margin-left: 20px; margin-right: 20px;
       font-size: 15px ">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fa fa-check"></i>Quarto ativado com sucesso.
        </div>
    @elseif(Session::has('message5'))
        <div class="alert alert-success alert-dismissible" style=" width: 97%;margin-left: 20px; margin-right: 20px;
       font-size: 15px ">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fa fa-check"></i>Quarto editado com sucesso.
        </div>
    @endif

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Gerenciamento dos quartos
        </h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Quartos cadastrados</h3>
            </div>

            <div class="box-body">
                <div class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <form action="{{route('sistema.main.quartos.pesquisar')}}" method="GET">
                            <div class="col-sm-3">
                                <div id="filtro" class="dataTables_filter">
                                    <label>Procurar:
                                        <input type="search" class="form-control input-sm"
                                               placeholder="Procure pelo nome"
                                               size="25%" name="valorPesquisado">
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
                            <table id="Hospedes" class="table table-bordered table-striped dataTable" role="grid">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="id">
                                        ID
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="nome">
                                        Nome
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="capacidade">
                                        Capacidade
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="Status atual do quarto">
                                        Status atual do quarto
                                    </th>
                                    <th>
                                        Ação
                                    </th>
                                </tr>
                                </thead>
                                <tbody>

                                @forelse($quartos as $quarto)
                                    <tr role="row" class="odd">
                                        <td>{{$quarto->id}}</td>
                                        <td>{{$quarto->nome}}</td>
                                        <td>{{$quarto->capacidade}}</td>
                                        <td>{{$quarto->status_quarto}}</td>
                                        <td>
                                            <label title="Editar quarto" for="Deseja editar o quarto?">
                                                <a class="btn btn-flat btn-warning" href="{{route('sistema.main.quartos.editar', $quarto->id)}}">
                                                    <i class="fa fa-fw fa-edit"></i>
                                                </a>
                                            </label>
                                            <label title="Ativar quarto" for="Deseja ativar o quarto?">
                                                <a class="btn btn-flat btn-primary" href="{{route('sistema.main.quarto.ativar', $quarto->id)}}">
                                                    <i class="fa fa-fw fa-check-circle"></i>
                                                </a>
                                            </label>
                                            <label title="Inativar quarto" for="Deseja inativar o quarto?">
                                                <a class="btn btn-flat btn-danger"
                                                   onclick="return confirm('Você tem certeza que deseja inativar este quarto?')"
                                                   href="{{route('sistema.main.quarto.inativar', $quarto->id)}}">
                                                    <i class="fa fa-fw fa-times-circle"></i>
                                                </a>
                                            </label>
                                        </td>
                                    </tr>
                                @empty
                                    <tr role="row" class="odd">
                                        <td colspan="8" align="center"><b>Nenhum quarto cadastrado no sistema ainda</b></td>
                                    </tr>
                                @endforelse
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">ID</th>
                                    <th rowspan="1" colspan="1">Nome</th>
                                    <th rowspan="1" colspan="1">Capacidade</th>
                                    <th rowspan="1" colspan="1">Status atual do quarto</th>
                                    <th rowspan="1" colspan="1">Ação</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                                {{$quartos -> links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- jQuery 3 -->
    <script src="{{asset('/assets/js/jquery.min.js')}}"></script>
@endsection
