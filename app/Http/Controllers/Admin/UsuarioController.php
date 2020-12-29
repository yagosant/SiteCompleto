<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Papel;

class UsuarioController extends Controller
{
    //criando o metodo
    public function login(Request $request){
        $dados = $request->all();

        //attempt valida os dados passados 
        if(Auth::attempt(['email'=>$dados['email'],'password'=>$dados['password']])){
            //salvando as mensagens de acerto com uma sessão para que as mesmas possam sumir
            \Session::flash('mensagem',[
                'msg' => 'Login efetuado com sucesso',
                'class' => 'green white-text'
                ]);
            return redirect()->route('admin.principal');
        }else{

            \Session::flash('mensagem',[
                'msg' => 'Dados incorredor, informe novamente',
                'class' => 'red white-text'
                ]);
            return redirect()->route('admin.login');
        }

    }

    //função para deslogar
    public function sair()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    //listar os usuarios
    public function index()
    {
         if(auth()->user()->can('usuario_listar')){
           
        $usuarios = User::all();
        //envia em formato de array
        return view('admin.usuarios.index', compact('usuarios'));

        }else{

            \Session::flash('mensagem',[
                'msg' => 'Sinto muito, você não tem permissão',
                'class' => 'red white-text'
                ]);
            return redirect()->route('admin.principal');
        }
 
    }

    //crud adicionar
    public function adicionar()
    {
        if(!auth()->user()->can('usuario_adicionar')){            
            return redirect()->route('admin.principal');
        }
        
        return view('admin.usuarios.adicionar');
    }

    //salva os dados
    public function salvar(Request $request)
    {
        if(!auth()->user()->can('usuario_adicionar')){            
            return redirect()->route('admin.principal');
        }

        $dados = $request->all();

        $usuario = new User();
        $usuario->name = $dados['name'];
        $usuario->email = $dados['email'];
        $usuario->password = bcrypt($dados['password']);
        $usuario->save();

        \Session::flash('mensagem',['msg'=>'Registro criado com sucesso!','class'=>'green white-text']);

        return redirect()->route('admin.usuarios');
    }

    //metodo de editar
    public function editar($id)
    {
        if(!auth()->user()->can('usuario_editar')){            
            return redirect()->route('admin.principal');
        }

        $usuario = User::find($id);
        return view('admin.usuarios.editar', compact('usuario'));
    }

    //metodo para atualizar
    public function atualizar(Request $request,$id)
    {
        if(!auth()->user()->can('usuario_editar')){            
            return redirect()->route('admin.principal');
        }

        $usuario = User::find($id);
        $dados = $request->all();
        if(isset($dados['password']) && strlen($dados['password']) > 5 ){
            $dados['password'] = bcrypt($dados['password']);
        }else{
            unset($dados['password']);
        }

        $usuario ->update($dados);
        \Session::flash('mensagem',['msg'=>'Registro atualizado com sucesso!','class'=>'green white-text']);

        return redirect()->route('admin.usuarios');
    }

    //metodo de delecão
    public function deletar($id)
    {
        if(!auth()->user()->can('usuario_deletar')){            
            return redirect()->route('admin.principal');
        }

        User::find($id)->delete();
        \Session::flash('mensagem',['msg'=>'Registro deletado com sucesso!','class'=>'green white-text']);
        return redirect()->route('admin.usuarios');
    }

    //metodo papel
    public function papel($id){
        if(!auth()->user()->can('usuario_editar')){            
            return redirect()->route('admin.principal');
        }

        $usuario = User::find($id);
        $papel = Papel::all();
        return view('admin.usuarios.papel',compact('usuario','papel'));
    }

    public function salvarPapel(Request $request,$id)
    {
        if(!auth()->user()->can('usuario_editar')){            
            return redirect()->route('admin.principal');
        }

        $usuario = User::find($id);
        $dados = $request->all();
        $papel = Papel::find($dados['papel_id']);
        $usuario->adicionaPapel($papel);
        return redirect()->back();
    }

    public function removerPapel($id,$papel_id)
    {
        if(!auth()->user()->can('usuario_editar')){            
        return redirect()->route('admin.principal');
    }
    
    $usuario = User::find($id);        
    $papel = Papel::find($papel_id);
    $usuario->removePapel($papel);
    return redirect()->back();
    }
}
