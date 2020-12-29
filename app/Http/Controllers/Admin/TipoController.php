<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tipo;
use App\Imovel;


class TipoController extends Controller
{
    //listar os usuarios
    public function index()
    {
        $registros = Tipo::all();
        //envia em formato de array
        return view('admin.tipos.index', compact('registros'));

    }

    //crud adicionar
    public function adicionar()
    {
        return view('admin.tipos.adicionar');
    }

    //salva os dados
    public function salvar(Request $request)
    {
        $dados = $request->all();

        $registro = new Tipo();
        $registro->titulo = $dados['titulo'];
        $registro->save();

        \Session::flash('mensagem',[
            'msg' => 'Tipo cadastrado com sucesso',
            'class' => 'green white-text'
            ]);

        return redirect()->route('admin.tipos');
        
    }

    //metodo de editar
    public function editar($id)
    {
        $registro = Tipo::find($id);
        return view('admin.tipos.editar', compact('registro'));
    }

    //metodo para atualizar
    public function atualizar(Request $request,$id)
    {
        $registro = Tipo::find($id);
        $dados = $request->all();
        $registro->titulo = $dados['titulo'];

        $registro->update();

        \Session::flash('mensagem',[
            'msg' => 'Tipo alterado com sucesso',
            'class' => 'green white-text'
            ]);

        return redirect()->route('admin.tipos');
    }

    //metodo de delecão
    public function deletar($id)
    {

        //verifica se tem algum imovel com a cidade
        if(Imovel::where('tipo_id', '=', '$id')->count()){
            $msg = "Não é Possivel deletar esse Tipo, Esses imoves(";
            //tras todos os imoveis com a cidade
            $imoveis = Imovel::where('tipo_id', '=', '$id')->get();

            foreach ($imoveis as $imovel){
                $msg .= "Id:".$imovel->id." ";
            }
            $msg .=") Estão relacionados.";


            \Session::flash('mensagem',[
                'msg' => $msg,
                'class' => 'red white-text'
                ]);
     
            return redirect()->route('admin.tipos');
        }

        $registro = Tipo::find($id)->delete();

        \Session::flash('mensagem',[
            'msg' => 'Tipo excluido com sucesso',
            'class' => 'green white-text'
            ]);

        return redirect()->route('admin.tipos');
    }
}
