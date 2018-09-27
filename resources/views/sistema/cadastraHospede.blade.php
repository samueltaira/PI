@extends('sistema.padraoSistema.head')

@section('titulo', 'Hóspedes')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Hóspede
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Cadastar novo Hóspede</h3>
            </div>
            <form role="form">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>

                    <div class="box-footer">
                        <button type="submit" formaction="" class="btn btn-primary">Cadastrar</button>
                        <a class="btn btn-dark" href="">Voltar</a>
                    </div>
                </div>
            </form>

        </div>
        
    </section>
@endsection