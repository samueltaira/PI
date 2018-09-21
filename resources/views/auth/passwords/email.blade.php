@extends('hotsite.padrao.head')
@section('titulo', 'Cadastro')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
@include('hotsite.padrao.header')

<div class="limiter"><br>
    <div class="container-login100" style="background-image: url('{{'../assets/images/bg-02.jpg'}}');">
        <div class="wrap-login100 p-t-30 p-b-50">

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @if ($errors->has('email'))
                <div class="alert alert-danger" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                </div>
            @endif

            <span class="login100-form-title p-b-41" style="font-family: Ubuntu-Bold, sans-serif;">
                Recupere sua conta
            </span>

            <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}"
                  class="login100-form validate-form p-b-33 p-t-5">
                @csrf

                <div align="center" class="wrap-input100 validate-input">

                    <label for="email">{{ __('E-Mail para recuperação de conta') }}</label>
                    <input id="email" type="email"
                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                           value="{{ old('email') }}" required>

                    <div class="container-login100-form-btn m-t-32">
                        <button type="submit" class="login100-form-btn">
                            {{ __('Enviar link de reset para e-mail') }}
                        </button>
                    </div>
                    <br>
                </div>
            </form>
        </div>
    </div>
</div>


@include('hotsite.padrao.footer')

</body>
