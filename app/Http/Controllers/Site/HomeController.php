<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imovel;
use App\Slide;
use App\Tipo;
use App\Cidades;

class HomeController extends Controller
{
    //
    public function index(){
        //listando todos os imoveis por ordem decrescente, sendo paginado de 4 m 4
        $imoveis = Imovel::where('publica', '=', 'sim')->orderBy('id','desc')->paginate(4);

        $slides = Slide::where('publicado','=','sim')->orderBy('ordem')->get();
        $direcaoImagem = ['center-align','left-align','right-align'];

        $pagination = true;

        $tipos = Tipo::orderBy('titulo')->get();
        $cidades = Cidades::orderBy('nome')->get();
        return view('site.home',compact('imoveis','slides','direcaoImagem','pagination','tipos','cidades'));
    }

    public function busca(Request $request){
            $busca = $request->all();
            
            $pagination = false;

            //testes para trazer os imoveis
            $tipos = Tipo::orderBy('titulo')->get();
            $cidades = Cidades::orderBy('nome')->get();

            //status
            if($busca['status']=='todos'){
                $testeStatus = [
                    //jogando um array dentro de outro, defini como null pq n tem a opção todos registrado no BD
                    ['status','<>', null]
                ];
            }else{
                $testeStatus = [
                    ['status','<>', $busca['status']]
                ];
            }

            //tipo
            if($busca['tipo_id']=='todos'){
                $testeTipo = [
                    //jogando um array dentro de outro, defini como null pq n tem a opção todos registrado no BD
                    ['tipo_id','<>', null]
                ];
            }else{
                $testeTipo = [
                    ['tipo_id','<>', $busca['tipo_id']]
                ];
            }

            //cidade
            if($busca['cidade_id']=='todos'){
                $testeCidade = [
                    //jogando um array dentro de outro, defini como null pq n tem a opção todos registrado no BD
                    ['cidade_id','<>', null]
                ];
            }else{
                $testeCidade = [
                    ['cidade_id','<>', $busca['cidade_id']]
                ];
            }


            //dormitotios
            $testeDorm =[
                ['dormitorios','>=',0],
                ['dormitorios','=', 1],
                ['dormitorios','=', 2],
                ['dormitorios','=', 3],
                ['dormitorios','>', 3],
            ];

            $numDorm = $busca['dormitorios'];

            //valor
            $testeValor = [
                [['valor','>=','0']],
                  [['valor','<=','500']],
                  [['valor','>=','500'],['valor','<=','1000']],
                  [['valor','>=','1000'],['valor','<=','5000']],
                  [['valor','>=','5000'],['valor','<=','10000']],
                  [['valor','>=','10000'],['valor','<=','50000']],
                  [['valor','>=','50000'],['valor','<=','100000']],
                  [['valor','>=','100000'],['valor','<=','200000']],
                  [['valor','>=','200000'],['valor','<=','300000']],
                  [['valor','>=','300000'],['valor','<=','500000']],
                  [['valor','>=','500000'],['valor','<=','1000000']],
                  [['valor','>=','1000000']]
                
            ];
            $numValor = $busca['valor'];
            
            //bairro
            if($busca['bairro'] != ''){
                $testeBairro = [
                    ['endereco','like','%'.$busca['bairro'].'%']
                ];
            }else{
                $testeBairro = [
                    ['endereco','<>',null]
                ];
            }

            $imoveis = Imovel::where('publica', '=', 'sim')
            ->where($testeStatus)
            ->where($testeTipo)
            ->where($testeCidade)
            ->where([$testeDorm[$numDorm]])
            ->where($testeValor[$numValor])
            ->where($testeBairro)
            ->orderBy('id','desc')->get();
            return view('site.busca',compact('busca','imoveis','pagination','tipos','cidades'));
    }
}
