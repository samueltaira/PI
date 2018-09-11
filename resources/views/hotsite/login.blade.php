@extends('hotsite.padrao.head')

@section('titulo', 'Login')

<body>

    @include('hotsite.padrao.header')
	
	<div class="limiter">
        <div class="container-login100" style="background-image: url('{{'../assets/images/bg-02.jpg'}}');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41" style="font-family: Ubuntu-Bold, sans-serif;">
					Acesse sua conta
				</span>
				<form  method="post" class="login100-form validate-form p-b-33 p-t-5">
                {{ csrf_field() }}

					<div class="wrap-input100 validate-input" data-validate = "Enter e-mail">
						<input class="input100" type="text" name="email" placeholder="E-mail">
						<span class="focus-input100" data-placeholder="&#xe818;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="senha" placeholder="Senha">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>
                    
					<div class="container-login100-form-btn m-t-32">
						<button type="submit" formaction="{{route('sistema.login.entrar')}}" class="login100-form-btn">
							Entrar   
						</button>
                    </div>
                    <br>
                    <div class="col-lg-12">
                        <button class="btn" formaction="" style="font-family: Ubuntu-Regular, sans-serif;">Esqueceu sua senha?</button>
                        <button class="btn" formaction="" style="font-family: Ubuntu-Regular, sans-serif;">Como se cadastrar?</button>
                    </div>
                    

				</form>
			</div>
		</div>
	</div>

    @include('hotsite.padrao.footer')

</body>

