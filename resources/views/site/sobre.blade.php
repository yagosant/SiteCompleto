@extends('layouts.site')

@section('content')


<div class="container">
 <div class="row section">
     <h3 align="center">Sobre</h3>
     <div class="divider"></div>
 </div>
 <div class="row section">

     <div class="col s12 m6">

        @if (isset($pagina->mapa))

        <div class="video-container">
        <!--_ Permite colocar um html como ex um iframe -->
                  {!! $pagina->mapa !!}  
                </div>    
            @else
                
            <img src="{{asset($pagina->imagem)}}" alt="" class="responsive-img">
        @endif
        
     </div>

     <div class="col s12 m6">
         <h4>{{$pagina->titulo}}</h4>
         <blockquote>
            {{$pagina->descricao}}
         </blockquote>
         <p>{{$pagina->texto}}</p>
    </div>
 </div>
</div>


@endsection
