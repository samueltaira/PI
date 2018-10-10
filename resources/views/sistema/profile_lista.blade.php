@extends('sistema.padraoSistema.head')

@section('titulo', 'Perfil')

@section('content')

    <section class="content-header">
        <div>
            <h1>
                Atendentes
            </h1>
        </div>

        {{--@if(Session::has('message'))--}}
            {{--<div class="alert alert-success alert-dismissible">--}}
                {{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>--}}
                {{--<i class="icon fa fa-check"></i>Atendente cadastrado com sucesso.--}}
            {{--</div>--}}
        {{--@endif--}}

    </section>

<!-- Main content -->
<section class="content">

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Atendentes registrados</h3>
        </div>

        <br>

            <div class="row">
                <div class="col-sm-12">
                    <table id="Atendentes" class="table table-bordered table-striped dataTable" role="grid"
                           aria-describedby="example1_info">
                        <thead>
                        <tr role="row">
                            <th class="sorting" tabindex="0" aria-controls="nome" rowspan="1" colspan="1"
                                aria-label="Nome:">
                                Nome
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="email" rowspan="1" colspan="1"
                                aria-label="E-mail">
                                E-mail
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="senha" rowspan="1" colspan="1"
                                aria-label="Senha">
                                E-mail
                            </th>
                            <th>
                                Ação
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--@foreach($atendentes as $atendente)--}}
                            {{--<tr role="row" class="odd">--}}
                                {{--<td>{{$atendente->nome}}</td>--}}
                                {{--<td>{{$atendente->email}}</td>--}}
                                {{--<td>{{$atendente->senha}}</td>--}}
                                {{--<td>--}}
                                    {{--<a class="btn btn-flat btn-warning"--}}
                                       {{--href="">--}}
                                        {{--<i class="fa fa-fw fa-edit"></i>--}}
                                    {{--</a>--}}
                                    {{--<a class="btn btn-flat btn-primary"><i--}}
                                                {{--class="fa fa-fw fa-book"></i></a>--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                        {{--@endforeach--}}

                        </tbody>
                        <tfoot>
                        <tr>
                            <th rowspan="1" colspan="1">Nome</th>
                            <th rowspan="1" colspan="1">Email</th>
                            <th rowspan="1" colspan="1">Senha</th>
                            <th rowspan="1" colspan="1">Ação</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


    </section>
@endsection
