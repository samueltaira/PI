<?php

use Illuminate\Database\Seeder;
use app\User;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dados =[
            'name' => "Samuel",
            'hotel'=> "Hotel Penha",
            'email'=> "samueltaira@hotmail.com",
            'password' => bcrypt("teste123"),
            'telefone'=> "47999999999",
            'quartos' => "20",
            'admin' => "sim"

        ];

        if(User::where('email', '=', $dados['email']) -> count()){

            $usuario = User::where('email', '=', $dados['email'])->first();
            $usuario-> update($dados);

        }else{

            User::create($dados);

        }
    }
}
