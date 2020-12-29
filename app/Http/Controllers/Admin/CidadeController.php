<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cidades;
use App\Imovel;

class CidadeController extends Controller
{
   //listar os usuarios
   public function index()
   {
       $registros = Cidades::all();
       //envia em formato de array
       return view('admin.cidades.index', compact('registros'));

   }

   //crud adicionar
   public function adicionar()
   {
       return view('admin.cidades.adicionar');
   }

   //salva os dados
   public function salvar(Request $request)
   {
       $dados = $request->all();

       $registro = new Cidades();
       $registro->nome = $dados['nome'];
       $registro->estado = $dados['estado'];
       $registro->sigla_estado = $dados['sigla_estado'];
       $registro->save();

       \Session::flash('mensagem',[
           'msg' => 'Cidade cadastrada com sucesso',
           'class' => 'green white-text'
           ]);

       return redirect()->route('admin.cidades');
       
   }

   //metodo de editar
   public function editar($id)
   {
       $registro = Cidades::find($id);
       return view('admin.cidades.editar', compact('registro'));
   }

   //metodo para atualizar
   public function atualizar(Request $request,$id)
   {
       $registro = Cidades::find($id);
       $dados = $request->all();
       $registro->nome = $dados['nome'];
       $registro->estado = $dados['estado'];
       $registro->sigla_estado = $dados['sigla_estado'];

       $registro->update();

       \Session::flash('mensagem',[
           'msg' => 'Cidade alterada com sucesso',
           'class' => 'green white-text'
           ]);

       return redirect()->route('admin.cidades');
   }

   //metodo de delecão
   public function deletar($id)
   {
        //verifica se tem algum imovel com a cidade
        if(Imovel::where('cidade_id', '=', '$id')->count()){
            $msg = "Não é Possivel deletar essa cidade, Esses imoves(";
            //tras todos os imoveis com a cidade
            $imoveis = Imovel::where('cidade_id', '=', '$id')->get();

            foreach ($imoveis as $imovel){
                $msg .= "Id:".$imovel->id." ";
            }
            $msg .=") Estão relacionados.";


            \Session::flash('mensagem',[
                'msg' => $msg,
                'class' => 'red white-text'
                ]);
     
            return redirect()->route('admin.cidades');
        }

       $registro = Cidades::find($id)->delete();

       \Session::flash('mensagem',[
           'msg' => 'Cidade excluida com sucesso',
           'class' => 'green white-text'
           ]);

       return redirect()->route('admin.cidades');
   }
}
