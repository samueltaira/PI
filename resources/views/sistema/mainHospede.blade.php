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
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Hóspedes cadastrados</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="dataTables_length" id="example1_length"><label>Mostrar
                                    <select name="example1_length" aria-controls="example1"
                                            class="form-control input-sm">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                    </select> registros</label></div>
                        </div>
                        <div class="col-sm-1">
                            <div id="example1_filter" class="dataTables_filter">
                                <label>Procurar:
                                    <input type="search" class="form-control input-sm" placeholder=""
                                           aria-controls="example1">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="Hospedes" class="table table-bordered table-striped dataTable" role="grid"
                                   aria-describedby="example1_info" >
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="ID: activate to sort column descending">ID
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                            aria-label="Nome: activate to sort column ascending">
                                            Nome
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                            aria-label="Cidade: activate to sort column ascending">Cidade
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                            aria-label="Estado: activate to sort column ascending">Estado
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                            aria-label="E-mail: activate to sort column ascending">
                                            E-mail
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                            aria-label="Contato: activate to sort column ascending">
                                            Contato
                                        </th>
                                        <th>
                                            Ação
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($registros as $registro)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{$registro->id}}</td>
                                        <td>{{$registro->nome}}</td>
                                        <td>{{$registro->cidade}}</td>
                                        <td>{{$registro->estado}}</td>
                                        <td>{{$registro->email}}</td>
                                        <td>{{$registro->contato}}</td>
                                        <td >
                                            <button type="button" class="btn btn-flat btn-warning"><i class="fa fa-fw fa-edit"></i></button>
                                            <button type="button" class="btn btn-flat btn-danger"><i class="fa fa-fw fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    @endforeach
                               </tbody>
                                <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">ID</th>
                                        <th rowspan="1" colspan="1">Nome</th>
                                        <th rowspan="1" colspan="1">Cidade</th>
                                        <th rowspan="1" colspan="1">Estado</th>
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
                            <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Mostrando 1
                                a 10 de 5 páginas
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button previous disabled" id="example1_previous">
                                        <a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0">Previous</a>
                                    </li>
                                    <li class="paginate_button active">
                                        <a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a></li>
                                    <li class="paginate_button ">
                                        <a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0">2</a></li>
                                    <li class="paginate_button next" id="example1_next">
                                        <a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0">Next</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </section>
@endsection
