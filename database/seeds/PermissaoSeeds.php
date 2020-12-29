<?php

use Illuminate\Database\Seeder;
Use App\Permissao;


class PermissaoSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permissao listar usuario
        if(!Permissao::where('nome','=','usuario_listar')->count()){
                //cria a permissao
                Permissao::create([
                    'nome' => 'usuario_listar',
                    'descricao' => 'Listar usuarios cadastrados'
                ]);
        }else{
            //vai atualizar
            $permissao = Permissao::where('nome','=','usuario_listar')->first();
            $permissao->update([
                'nome' => 'usuario_listar',
                'descricao' => 'Listar usuarios cadastrados'
            ]);
        }

        //Permissao adicionar usuario
        if(!Permissao::where('nome','=','usuario_adicionar')->count()){
           
            Permissao::create([
                'nome' => 'usuario_adicionar',
                'descricao' => 'Cadastrar usuarios'
            ]);
    }else{
      
        $permissao = Permissao::where('nome','=','usuario_adicionar')->first();
        $permissao->update([
            'nome' => 'usuario_adicionar',
            'descricao' => 'Cadastrar usuarios'
        ]);
    }

    
        //Permissao Editar usuario
        if(!Permissao::where('nome','=','usuario_editar')->count()){
           
            Permissao::create([
                'nome' => 'usuario_editar',
                'descricao' => 'Editar usuarios'
            ]);
    }else{
       
        $permissao = Permissao::where('nome','=','usuario_editar')->first();
        $permissao->update([
            'nome' => 'usuario_editar',
            'descricao' => 'Editar usuarios'
        ]);
    }
    
        //Permissao Excluir usuario
        if(!Permissao::where('nome','=','usuario_deletar')->count()){
           
            Permissao::create([
                'nome' => 'usuario_deletar',
                'descricao' => 'Deletar usuarios'
            ]);
    }else{
       
        $permissao = Permissao::where('nome','=','usuario_deletar')->first();
        $permissao->update([
            'nome' => 'usuario_deletar',
            'descricao' => 'Deletar usuarios'
        ]);  
    }

    //papel Listar
    if(!Permissao::where('nome','=','papel_listar')->count()){
        Permissao::create([
                'nome'=>'papel_listar',
                'descricao'=>'Listar Papéis'
            ]);
    }else{
        $permissao = Permissao::where('nome','=','papel_listar')->first();
        $permissao->update([
                'nome'=>'papel_listar',
                'descricao'=>'Listar Papéis'
            ]);
    }


    //papel adicionar
    if(!Permissao::where('nome','=','papel_adicionar')->count()){
        Permissao::create([
                'nome'=>'papel_adicionar',
                'descricao'=>'Adicionar Papéis'
            ]);
    }else{
        $permissao = Permissao::where('nome','=','papel_adicionar')->first();
        $permissao->update([
                'nome'=>'papel_adicionar',
                'descricao'=>'Adicionar Papéis'
            ]);
    }

    //papel Editar
    if(!Permissao::where('nome','=','papel_editar')->count()){
        Permissao::create([
                'nome'=>'papel_editar',
                'descricao'=>'Editar Papéis'
            ]);
    }else{
        $permissao = Permissao::where('nome','=','papel_editar')->first();
        $permissao->update([
                'nome'=>'papel_editar',
                'descricao'=>'Editar Papéis'
            ]);
    }

    //papel Deletar
    if(!Permissao::where('nome','=','papel_deletar')->count()){
        Permissao::create([
                'nome'=>'papel_deletar',
                'descricao'=>'Deletar Papéis'
            ]);
    }else{
        $permissao = Permissao::where('nome','=','papel_deletar')->first();
        $permissao->update([
                'nome'=>'usuario_deletar',
                'descricao'=>'Deletar Papéis'
            ]);
    }

    }
}
