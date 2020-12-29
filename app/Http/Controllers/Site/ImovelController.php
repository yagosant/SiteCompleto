<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imovel;
class ImovelController extends Controller
{
    //
    public function index($id){
        $imovel = Imovel::find($id);
        //lista as Imagend da galeria e ordena de acordo com a ordem estipulada
        $galeria = $imovel->galeria()->orderBy('ordem')->get();
        $direcaoImagem = ['center-align','left-align','right-align'];

        $seo =[
            'titulo' => $imovel->titulo, //nome do site
            'descricao' =>$imovel->descricao,
            'imagem' => asset($imovel->imagm),//Imagem do site
            'url' => route('site.imovel',[$imovel->id, str_slug($imovel->titulo,'_')])
        ];

        return view('site.imovel',compact('imovel','direcaoImagem','galeria','seo'));
    }
}
