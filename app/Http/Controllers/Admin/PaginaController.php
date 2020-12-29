<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\pagina;

class PaginaController extends Controller
{
    //
    public function index(){
        $paginas = Pagina::all();
        return  view('admin.paginas.index', compact('paginas'));
    }
    
    public function editar($id){
        //recebe as informações da página
        $pagina = Pagina::find($id);
        return view('admin.paginas.editar',compact('pagina'));
    }
    
    public function atualizar(Request $request, $id)
    {
        $dados = $request->all();
        //dd($dados['titulo']);

        $pagina = Pagina::find($id);
        $pagina->titulo = trim($dados['titulo']);
        $pagina->descricao = trim($dados['descricao']);
        $pagina->texto = trim($dados['texto']);

        if(isset($dados['email'])){
        $pagina->email = trim($dados['email']);
        }
        if(isset($dados['mapa']) && trim($dados['mapa']) != ''){
            $pagina->mapa = trim($dados['mapa']);
            }else{
                $pagina->mapa = null;
            }

            //pegando as informações da imagem
        $file = $request->file('imagem');
        
        //verifica se a imagem existe
        if($file){
            $rand = rand(11111,99999);
            $diretorio = "img/paginas/".$id."/";
            //traz a extensão da imagem
            $ext = $file->guessClientExtension();
            $nomeArquivo = "_img".$rand.".".$ext;
            //nome da pasta e nome do arquivo
            $file->move($diretorio,$nomeArquivo);
            $pagina->imagem = $diretorio.'/'.$nomeArquivo;
        }

        $pagina->update();

        \Session::flash('mensagem',[
            'msg' => 'Página alterada com sucesso',
            'class' => 'green white-text'
            ]);

        return redirect()->route('admin.paginas');
    }
}
