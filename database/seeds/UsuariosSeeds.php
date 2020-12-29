<?php

use Illuminate\Database\Seeder;
use App\User;

class UsuariosSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //verifica se o user existe
        if(User::where('email','=','yago.ribeiro@bahamas.com.br')->count()){
            $usuario = User::where('email','=','yago.ribeiro@bahamas.com.br')->first();

            $usuario->name = "Yago dos Santos";
            $usuario->email = "yago.ribeiro@bahamas.com.br";
            $usuario->password = bcrypt("123456");
            $usuario->save();

        }else{

        //usando o model User
        $usuario = new User();
        $usuario->name = "Yago dos Santos";
        $usuario->email = "yago.ribeiro@bahamas.com.br";
        $usuario->password = bcrypt("123456");
        $usuario->save();
    }
    }
}
