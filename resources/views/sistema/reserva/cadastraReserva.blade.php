@extends('sistema.padraoSistema.head')
@section('titulo', 'Quartos')
@section('content')
    <section class="content-header">
        <div>
            <h1>
                Reserva
            </h1>
        </div>
        @if(count($errors) != 0)
            @foreach($errors->all() as $erro)
                <div class="teste alert alert-danger alert-dismissible" role="alert"
                     style="text-align: center; position: absolute; top: 37%; left: 15%; width: 84%">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p>{{$erro}}</p>
                </div>
            @endforeach
        @endif
    </section>

    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Realizar nova reserva </h3>
            </div>
            <form method="POST" role="form">
                {{csrf_field()}}
                <div class="box-body">
                    <div class="form-group">
                        <label for="dataInicio">Data Início:</label>
                        <input type="date" name="inicioReserva">
                        {{--required--}}
                        <label for="dataFim">Data Fim:</label>
                        <input  type="date" name="fimReserva">
                        {{--required--}}
                    </div>

                    <div class="form-group">
                        <label for="capacidade">Capacidade do quarto:</label><br>
                        <select name="capacidade">
                            <option value="Individual"> Individual<br>
                            <option value="Duplo"> Duplo<br>
                            <option value="Triplo"> Triplo<br>
                            <option value="Quadruplo"> Quadruplo<br>
                            <option value="Quintuplo"> Quintuplo<br>
                            <option value="Sextuplo"> Sextuplo<br>
                            <option value="7+"> 7+
                        </select>
                    </div>
                    <button type="submit" formaction="{{route('core.check.reserva')}}" class="btn btn-primary">Checar quartos disponíveis</button>
                    <a class="btn btn-default" href="{{route('core.reserva')}}">Voltar</a>
                    <br><br>
                    <hr>

                @if(isset($quartosId))
                    <div class="form-group">
                        <label for="hospede">Hóspede:</label>
                        <input type="text" class="form-control" name="nome" placeholder="Hóspede" value="{{old('nome')}}">
                    </div>
                    <div class="form-group">
                        <label for="quarto">Quarto:</label><br>
                        @forelse($quartosId as $teste)
                            <select name="quarto">
                                <option value="Quarto 101">{{$teste->nome}}<br>
                            </select>
                    </div>
                    <div class="box-footer">
                        <button type="submit" formaction="{{route('core.realiza.reserva')}}" class="btn btn-success">Efetuar nova reserva
                        </button>
                    </div>
                        @empty
                            <tr role="row">
                                <div class="callout callout-warning">
                                    <h4>Alerta!</h4>
                                    <p>Nenhum quarto disponível para esta data ou capacidade.</p>
                                </div>
                            </tr>
                        @endforelse
                @endif
                </div>

                <input type="hidden" name="hotel_id" value="{{auth()->user()->getHotelId()}}">
                <input type="hidden" name="hospede_id" value="1">
                <input type="hidden" name="quarto_id" value="1">
                <input type="hidden" name="consumo" value="x">
                <input type="hidden" name="efetuouReserva" value="x">
            </form>
        </div>
    </section>
@endsection