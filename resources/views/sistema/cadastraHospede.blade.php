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
            <form method="POST" role="form">
                {{csrf_field()}}
                <div class="box-body">
                    <div class="form-group">
                        <label for="nomeHospede">Nome</label>
                        <input type="text" class="form-control" name="nome" id="nomeHospede" placeholder="Nome">
                    </div>
                    <div class="form-group">
                        <label for="cidadeHospede">Cidade</label>
                        <input type="text" class="form-control" name="cidade" id="cidadeHospede" placeholder="Cidade">
                    </div>
                    <div class="form-group">
                        <label for="emailHospede">Email</label>
                        <input type="email" class="form-control" id="emailHospede" name="email" placeholder="Insira o e-mail">
                    </div>
                    <div class="form-group">
                        <label for="contatoHospede">Contato</label>
                        <input type="text" class="form-control" id="contatoHospede" name="contato" placeholder="Telefone Contato">
                    </div>
                    <div class="form-group">
                        <label for="cpfHospede">CPF</label>
                        <input type="text" class="form-control" id="cpfHospede" name="documento" placeholder="CPF">
                    </div>
                    <div class="form-group">
                        <label for="dataNascimento">Data Nascimento</label>
                        <input type="date" class="form-control" id="dataNascimento" name="dataNascimento" placeholder="00/00/0000">
                    </div>


                    <div class="box-footer">
                        <button type="submit" formaction="{{route('sistema.main.hospedes.salvar')}}" class="btn btn-primary">Cadastrar</button>
                        <a class="btn btn-dark" href="{{route('sistema.main.hospedes')}}">Voltar</a>
                    </div>
                </div>
            </form>

        </div>

    </section>
@endsection