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

    <!-- Main content -->
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
                            <table id="Hospedes" class="table table-bordered table-striped dataTable" role="grid"
                                   aria-describedby="example1_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="id" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="ID: activate to sort column descending">ID
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="nome" rowspan="1" colspan="1"
                                        aria-label="Nome: activate to sort column ascending">
                                        Nome
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="dataNascimento" rowspan="1"
                                        colspan="1"
                                        aria-label="dataNascimento: activate to sort column ascending">
                                        Data Nascimento
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="documento" rowspan="1" colspan="1"
                                        aria-label="Documento: activate to sort column ascending">
                                        Documento
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="cidade" rowspan="1" colspan="1"
                                        aria-label="Cidade: activate to sort column ascending">Cidade
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="email" rowspan="1" colspan="1"
                                        aria-label="E-mail: activate to sort column ascending">
                                        E-mail
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="contato" rowspan="1" colspan="1"
                                        aria-label="Contato: activate to sort column ascending">
                                        Contato
                                    </th>
                                    <th>
                                        Ação
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($hospedes as $hospede)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{$hospede->id}}</td>
                                        <td>{{$hospede->nome}}</td>
                                        <td>{{$hospede->dataNascimento}}</td>
                                        <td>{{$hospede->documento}}</td>
                                        <td>{{$hospede->cidade}}</td>
                                        <td>{{$hospede->email}}</td>
                                        <td>{{$hospede->contato}}</td>
                                        <td>
                                            <a class="btn btn-flat btn-warning"
                                               href="{{route('sistema.main.hospedes.editar', $hospede->id)}}">
                                                <i class="fa fa-fw fa-edit"></i>
                                            </a>
                                            <a class="btn btn-flat btn-primary"><i
                                                        class="fa fa-fw fa-book"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">ID</th>
                                    <th rowspan="1" colspan="1">Nome</th>
                                    <th rowspan="1" colspan="1">Data Nascimento</th>
                                    <th rowspan="1" colspan="1">Documento</th>
                                    <th rowspan="1" colspan="1">Cidade</th>
                                    <th rowspan="1" colspan="1">E-mail</th>
                                    <th rowspan="1" colspan="1">Contato</th>
                                    <th rowspan="1" colspan="1">Ação</th>
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
