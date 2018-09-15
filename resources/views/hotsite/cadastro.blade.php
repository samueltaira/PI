@extends('hotsite.padrao.head')

@section('titulo', 'Cadastro')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body>

@include('hotsite.padrao.header')

<div class="limiter"><br>


    <div class="container-login100" style="background-image: url('{{'../assets/images/bg-02.jpg'}}');">


        <div class="wrap-login100 p-t-30 p-b-50">


            <form action="{{route('hotsite.cadastro.registrar')}}" method="post"
                  class="login100-form validate-form p-b-33 p-t-5">
                {{csrf_field()}}

                <div class="wrap-input100 validate-input">
                    <input required class="input100" type="text" name="nome" placeholder="Nome" value="{{old('nome')}}">
                    <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                </div>

                <div required class="wrap-input100 validate-input">
                    <input required class="input100" type="text" name="hotel" placeholder="Hotel" value="{{old('hotel')}}">
                    <span class="focus-input100" data-placeholder="&#xe801;"></span>
                </div>

                <div required class="wrap-input100 validate-input">
                    <input class="input100" type="email" name="email" placeholder="E-mail" value="{{old('email')}}">
                    <span class="focus-input100" data-placeholder="&#xe818;"></span>
                </div>

                <div required class="wrap-input100 validate-input">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                </div>

                <div required class="wrap-input100 validate-input">
                    <input class="input100" type="tel" name="telefone" placeholder="Telefone" value="{{old('telefone')}}">
                    <span class="focus-input100" data-placeholder="&#xe830;"></span>
                </div>

                <div required class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="quartos" placeholder="Nº de quartos" value="{{old('quartos')}}">
                    <span class="focus-input100" data-placeholder="&#xe800;"></span>
                </div>


                <input type="hidden" name="admin" value="sim">


                <div class="container-login100-form-btn m-t-32">
                    <button class="login100-form-btn">
                        Cadastrar
                    </button>
                </div>


            </form>
        </div>


            @if(count($errors) != 0)
                <div style="position: absolute; top: 20%; left: 10%; width: 20% ">
                    @foreach($errors->all() as $erro)
                        <div class=" alert alert-danger" style="text-align: center;"><p>{{$erro}}</p></div>
                    @endforeach
                </div>
            @endif

    </div>
</div>


@include('hotsite.padrao.footer')

</body>
