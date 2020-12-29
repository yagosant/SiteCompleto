<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slide;

class SlideController extends Controller
{
         //listar os usuarios
   public function index()
   {
      
       //ordena de acordo com o atributo de forma crescentr
       $registros =Slide::orderBy('ordem')->get();
              
       //envia em formato de array
       return view('admin.slides.index', compact('registros'));

   }

   //crud adicionar
   public function adicionar()
   {
      
       return view('admin.slides.adicionar');
   }

   //salva os dados
   public function salvar(Request $request)
   {
    

    //verifica se o imvovel já possui imgs na galeria
    if(Slide::count()){
        //traz o ultimo registro
        $slides =Slide::orderBy('ordem','desc')->first();

        $ordemAtual = $slides->ordem;
    }else{
        $ordemAtual = 0;
    }

    if($request->hasFile('imagens')){
        $arquivos = $request->file('imagens');

        //varre imagens para ver quantas existem
        foreach($arquivos as $imagem){
            //para cada registro cria uma galeria
        $registro = new Slide();

        //valida e salva na pasta
        $rand = rand(11111,99999);
        $diretorio = "img/slides/";
        $ext = $imagem->guessClientExtension();
        $nomeArquivo = "_img_".$rand.".".$ext;
        $imagem->move($diretorio,$nomeArquivo);
        $registro->ordem = $ordemAtual + 1;
        $ordemAtual++;
        $registro->imagem = $diretorio.'/'.$nomeArquivo;
        $registro->save();
        
 
    }
}
 
       \Session::flash('mensagem',['msg'=>'Registro criado com sucesso!','class'=>'green white-text']);

       return redirect()->route('admin.slides');
       
   }

   //metodo de editar
   public function editar($id)
   {
       $registro = Slide::find($id);
       
       return view('admin.slides.editar',compact('registro'));
   }

   //metodo para atualizar
   public function atualizar(Request $request, $id)
   {
    $registro = Slide::find($id);
    $dados = $request->all();

    $registro->titulo = $dados['titulo'];
    $registro->descricao = $dados['descricao'];
    $registro->link = $dados['link'];
    $registro->ordem = $dados['ordem'];
    $registro->publicado = $dados['publicado'];

    $imovel = $registro->imovel;
    

    $file = $request->file('imagem');
    if($file){
        $rand = rand(11111,99999);
        $diretorio = "img/slides/";
        $ext = $file->guessClientExtension();
        $nomeArquivo = "_img_".$rand.".".$ext;
        $file->move($diretorio,$nomeArquivo);
        $registro->imagem = $diretorio.'/'.$nomeArquivo;
    }

    
    $registro ->update();

    \Session::flash('mensagem',['msg'=>'Registro atualizado com sucesso!','class'=>'green white-text']);

    return redirect()->route('admin.slides');
   }

   public function deletar($id)
   {
    $slide = Slide::find($id);
   
    $slide->delete();

    \Session::flash('mensagem',['msg'=>'Registro deletado com sucesso!','class'=>'green white-text']);

    return redirect()->route('admin.slides');
   }
}
