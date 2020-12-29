<?php

use Illuminate\Database\Seeder;
use App\Pagina;

class PaginasSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //verifica se n foi criado uma página, e garante n crie mais de uma
        $existe = Pagina::where('tipo','=','sobre')->count();

        //dd($existe);

        //testando, se sim traz o primeiro elemento 
        if($existe){
            $paginaSobre = Pagina::where('tipo','=','sobre')->first();
        }else{
            $paginaSobre= new Pagina();
        }

        //dd($paginaSobre->titulo);

        $paginaSobre->titulo = "A Empresa";
        $paginaSobre->descricao = "A descrição da Empresa criada";
        $paginaSobre->texto = "Texto sobre a empresa Empresa";
        $paginaSobre->imagem = "img/bahamas.jpg";
        $paginaSobre->mapa = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3706.9812173367504!2d-43.452011285678466!3d-21.703454001493746!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x989f1b7687a029%3A0x98e3d23de3a28e3f!2sBahamas%20-%20Centro%20de%20Distribui%C3%A7%C3%A3o!5e0!3m2!1spt-BR!2sbr!4v1608741209452!5m2!1spt-BR!2sbr" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>';
        $paginaSobre->tipo = "sobre";
        $paginaSobre->save();

        echo "Pagina Sobre criada com sucesso!";

        //-------------------------pagina de contato ---------------------------------------

        //verifica se n foi criado uma página, e garante n crie mais de uma
        $existe = Pagina::where('tipo','=','contato')->count();

        //dd($existe);

        //testando, se sim traz o primeiro elemento 
        if($existe){
            $paginaContato = Pagina::where('tipo','=','contato')->first();
        }else{
            $paginaContato= new Pagina();
        }

        //dd($paginaSobre->titulo);

        $paginaContato->titulo = "Entre em contato";
        $paginaContato->descricao = "Preencha o formulário de contto";
        $paginaContato->texto = "Texto";
        $paginaContato->imagem = "img/bahamas.jpg";
        $paginaContato->email = "yagojf23@gmail.com";
       // $paginaContato->mapa = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3706.9812173367504!2d-43.452011285678466!3d-21.703454001493746!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x989f1b7687a029%3A0x98e3d23de3a28e3f!2sBahamas%20-%20Centro%20de%20Distribui%C3%A7%C3%A3o!5e0!3m2!1spt-BR!2sbr!4v1608741209452!5m2!1spt-BR!2sbr" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>';
        $paginaContato->tipo = "contato";
        $paginaContato->save();

        echo "Pagina Contato criada com sucesso!";
    }
}
