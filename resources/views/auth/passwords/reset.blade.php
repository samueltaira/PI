@extends('hotsite.padrao.head')
@section('titulo', 'Resetar senha')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
@include('hotsite.padrao.header')

<div class="limiter" style=" background-image: url('{{'../../assets/images/bg-02.jpg'}}');"><br>
    <div class="container-login100">
        <div class="wrap-login100 p-t-30 p-b-50">

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
            @endif
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
            @endif

            <span class="login100-form-title p-b-41" style="font-family: Ubuntu-Bold, sans-serif;">
                Recupere sua conta
            </span>

            <form method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}"
                  class="login100-form validate-form p-b-33 p-t-5">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div align="center" class="wrap-input100 validate-input">

                    <label for="email">{{ __('E-Mail') }}</label>

                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                           name="email"
                           value="{{ $email ?? old('email') }}" required autofocus>

                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password"
                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                           name="password" required>

                    <label for="password-confirm">{{  __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                           required>

                    <div class="container-login100-form-btn m-t-32">
                        <button type="submit" class="login100-form-btn">
                            {{ __('Resetar senha') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@include('hotsite.padrao.footer')

</body>
