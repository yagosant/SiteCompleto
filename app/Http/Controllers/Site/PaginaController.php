<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pagina;

class PaginaController extends Controller
{
    //
    public function sobre(){
        $pagina = Pagina::where('tipo', '=','sobre')->first();

        //dd($pagina);
        return view('site.sobre', compact('pagina'));
    }

    public function contato(){
        $pagina = Pagina::where('tipo', '=','contato')->first();

        //dd($pagina);
        return view('site.contato', compact('pagina'));
    }

    public function enviarContato(Request $request){
            //dd($request);

            $pagina = Pagina::where('tipo','=','contato')->first();
            $email = $pagina->email;

            //busca o template do diretorio emails, na função seta uma variavel para onde vai etc
            \Mail::send('emails.contato',['request'=>$request],
            function($m) use($request,$email){
                    //configra o e-mail
                    $m->from($request['email'],$request['nome']);
                    $m->replyTo($request['email'],$request['nome']);
                    $m->subject('Contato via formulario site');
                    $m->to($email,'Contato via site');
            });

            \Session::flash('mensagem',[
                'msg' => 'Contato enviado com sucesso',
                'class' => 'green white-text'
                ]);
    
            return redirect()->route('site.contato');

    }
}
