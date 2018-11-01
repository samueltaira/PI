@extends('sistema.padraoSistema.head')
@section('titulo', 'Hóspedes')
@section('content')
    <section class="content-header">
        <div>
            <h1>
                Hóspede
            </h1>
        </div>
        @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fa fa-check"></i>Hóspede cadastrado com sucesso.
            </div>
        @endif
        @if(Session::has('message1'))
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fa fa-check"></i>Hóspede editado com sucesso.
            </div>
        @endif
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Hóspedes cadastrados</h3>
            </div>
            <div class="box-body">
                <div class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <form action="{{route('sistema.main.hospedes.pesquisar')}}" method="GET">
                            <div class="col-sm-3">
                                <div id="filtro" class="dataTables_filter">
                                    <label>Procurar:
                                        <input type="search" class="form-control input-sm"
                                               placeholder="Procure pelo nome ou documento"
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
                            <table class="table table-bordered table-striped dataTable">
                                <thead>
                                    <tr role="row">
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Data Nascimento</th>
                                        <th>Documento</th>
                                        <th>Cidade</th>
                                        <th>E-mail</th>
                                        <th>Contato</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($hospedes as $hospede)
                                    <tr role="row">
                                        <td>{{$hospede->id}}</td>
                                        <td>{{$hospede->nome}}</td>
                                        <td>{{$hospede->dataNascimento}}</td>
                                        <td>{{$hospede->documento}}</td>
                                        <td>{{$hospede->cidade}}</td>
                                        <td>{{$hospede->email}}</td>
                                        <td>{{$hospede->contato}}</td>
                                        <td>
                                            <a title="Editar Hóspede" class="btn btn-flat btn-warning"
                                               href="{{route('sistema.main.hospedes.editar', $hospede->id)}}">
                                                <i class="fa fa-fw fa-edit"></i>
                                            </a>
                                            <a title="Efetuar nova reserva" class="btn btn-flat btn-primary">
                                                <i class="fa fa-fw fa-book"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr role="row">
                                        <td colspan="8" align="center"><b>Nenhum hóspede cadastrado no sistema ainda</b>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Data Nascimento</th>
                                        <th>Documento</th>
                                        <th>Cidade</th>
                                        <th>E-mail</th>
                                        <th>Contato</th>
                                        <th>Ação</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                                {{$hospedes -> links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection
