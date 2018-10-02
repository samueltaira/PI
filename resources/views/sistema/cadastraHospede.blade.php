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
                        <label for="estadoHospede">Estado</label>
                        <select name="estado" id="estadoHospede" class="form-control">
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                        </select>
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