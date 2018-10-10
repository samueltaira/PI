@extends('sistema.padraoSistema.head')

@section('titulo', 'Profile')

@section('content')

    <section class="content-header">
        <h1>
            Perfil
        </h1>
    </section>

    <section class="content">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Configurações</h3>
            </div>
            <form method="POST" role="form">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="put">
                <div class="box-body">
                    <div class="form-group">
                        <label for="nomeProfile">Nome</label>
                        <input readonly="true" type="text" class="form-control" name="nome" id="nomeProfile"
                               value="{{auth()->user()->nome}}">
                    </div>
                    <div class="form-group">
                        <label for="emailProfile">Email</label>
                        <input readonly="true" type="email" class="form-control" id="emailProfile" name="email"
                               value="{{auth()->user()->email}}">
                    </div>
                    <div class="form-group">
                        <label for="senhaProfile">Senha</label>
                        <input readonly="true" type="text" class="form-control" name="capa_senha"
                               value="**********">
                        <input type="hidden" id="senhaProfile" name="senha"
                               value="{{auth()->user()->password}}">
                        {{--<br>--}}
                        {{--<button type="button" class="btn btn-flat btn-primary btn-sm">Alterar senha</button>--}}
                    </div>
                    <div class="form-group">
                        <label for="adminProfile">Administrador</label>
                        <input readonly="true" type="text" class="form-control" id="adminProfile" name="admin"
                               value="{{auth()->user()->admin}}">
                    </div>


                    <div class="box-footer">
                        {{--<button type="submit" formaction="" class="btn btn-primary">Salvar</button>--}}
                        <a class="btn btn-dark" href="">Voltar</a>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
