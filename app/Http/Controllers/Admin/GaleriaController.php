<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Galeria;
use App\Imovel;

class GaleriaController extends Controller
{
     //listar os usuarios
   public function index($id)
   {
       //lista o imovel de acordo com ID
       $imovel = Imovel::find($id);

       //ordena de acordo com o atributo de forma crescentr
       $registros = $imovel->galeria()->orderBy('ordem')->get();
              
       //envia em formato de array
       return view('admin.galerias.index', compact('registros','imovel'));

   }

   //crud adicionar
   public function adicionar($id)
   {
      
       $imovel = Imovel::find($id);
       return view('admin.galerias.adicionar',compact('imovel'));
   }

   //salva os dados
   public function salvar(Request $request, $id)
   {
    
    $imovel = Imovel::find($id);   
    $dados = $request->all();

    //verifica se o imvovel já possui imgs na galeria
    if($imovel->galeria()->count()){
        $galeria = $imovel->galeria()->orderBy('ordem','desc')->first();

        $ordemAtual = $galeria->ordem;
    }else{
        $ordemAtual = 0;
    }

    if($request->hasFile('imagens')){
        $arquivos = $request->file('imagens');

        //varre imagens para ver quantas existem
        foreach($arquivos as $imagem){
            //para cada registro cria uma galeria
        $registro = new Galeria();

        //valida e salva na pasta
        $rand = rand(11111,99999);
        $diretorio = "img/imoveis/".str_slug($imovel->titulo,'_')."/";
        $ext = $imagem->guessClientExtension();
        $nomeArquivo = "_img_".$rand.".".$ext;
        $imagem->move($diretorio,$nomeArquivo);
        $registro->imovel_id = $imovel->id;
        $registro->ordem = $ordemAtual + 1;
        $ordemAtual++;
        $registro->imagem = $diretorio.'/'.$nomeArquivo;
        $registro->save();
        
 
    }
}
 
       \Session::flash('mensagem',['msg'=>'Registro criado com sucesso!','class'=>'green white-text']);

       return redirect()->route('admin.galerias',$imovel->id);
       
   }

   //metodo de editar
   public function editar($id)
   {
       $registro = Galeria::find($id);
        $imovel = $registro->imovel;
       
       return view('admin.galerias.editar',compact('registro','imovel'));
   }

   //metodo para atualizar
   public function atualizar(Request $request, $id)
   {
    $registro = Galeria::find($id);
    $dados = $request->all();

    $registro->titulo = $dados['titulo'];
    $registro->descricao = $dados['descricao'];
    $registro->ordem = $dados['ordem'];

    $imovel = $registro->imovel;
    

    $file = $request->file('imagem');
    if($file){
        $rand = rand(11111,99999);
        $diretorio = "img/imoveis/".str_slug($imovel->titulo,'_')."/";
        $ext = $file->guessClientExtension();
        $nomeArquivo = "_img_".$rand.".".$ext;
        $file->move($diretorio,$nomeArquivo);
        $registro->imagem = $diretorio.'/'.$nomeArquivo;
    }

    
    $registro ->update();

    \Session::flash('mensagem',['msg'=>'Registro atualizado com sucesso!','class'=>'green white-text']);

    return redirect()->route('admin.galerias',$imovel->id);
   }

   public function deletar($id)
   {
    $galeria = Galeria::find($id);
    //coloca na variavel para evitar que se apague o objero sem ter feito a referencia
    $imovel = $galeria->imovel;

    $galeria->delete();

    \Session::flash('mensagem',['msg'=>'Registro deletado com sucesso!','class'=>'green white-text']);

    return redirect()->route('admin.galerias',$imovel->id);
   }
}
