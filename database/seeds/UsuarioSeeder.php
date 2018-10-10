<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Hotel;

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
            'nome' => "Samuel",
            'email'=> "samueltaira@hotmail.com",
            'hotel_id'=> "1",
            'password' => bcrypt("teste123"),
            'telefone'=> "47999999999",
            'quartos' => "0",
            'admin' => "sim",

        ];

        $dados2 =[
            'hotel'=>'Hotel Penha',
        ];

        if(User::where('email', '=', $dados['email']) -> count()){

            $usuario = User::where('email', '=', $dados['email'])->first();
            $usuario-> update($dados);
            echo "Usuario alterado!";

        }else{

            Hotel::create($dados2);

            User::create($dados);

            echo "Usuario e hotel criado!";

        }
    }
}
