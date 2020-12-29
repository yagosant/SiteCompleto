@extends('layouts.site')

@section('content')



<div class="container">
   <div class="row section">
      <h3 align="center">Contato</h3>
      <div class="divider"></div>
  </div>
  <div class="row section">
      <div class="col s12 m7">


         @if (isset($pagina->mapa))

         <div class="video-container">
         <!--_ Permite colocar um html como ex um iframe -->
                   {!! $pagina->mapa !!}  
                 </div>    
             @else
                 
             <img src="{{asset($pagina->imagem)}}" alt="" class="responsive-img">
         @endif



      </div>
      <div class="col s12 m5">

         <h4>{{$pagina->titulo}}</h4>
         <blockquote>
            {{$pagina->descricao}}
         </blockquote>
         <!--_ Implementando o envio de e-mail com o Laravel -->
          <form action="{{route('site.contato.enviar')}}" class="col s12" method="POST" enctype="multipart/form-data">
               
            {{csrf_field()}}

             <div class="input-field">
                <input type="text" name="nome" id="" class="validade">
                <label for="nome">Nome</label>

                <div class="input-field">
                  <input type="email" name="email" id="" class="validade">
                  <label for="email">E-mail</label>
                
                  <div class="input-field">
                     <textarea name="mensagem" id="" cols="30" rows="10" class="materialize-textarea"></textarea>
                   <label for="mensagem">Mensagem</label>
             </div>
             <button class="btn blue">Enviar</button>
          </form>
          
     </div>
  </div> 
</div>


@endsection
