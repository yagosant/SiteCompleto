@extends('layouts.site')

@section('content')


<div class="container">
 <div class="row section">
     <h3 align="center">Imovel</h3>
     <div class="divider"></div>
 </div>
 <div class="row section">
     <div class="col s12 m8">
         @if ($imovel->galeria->count())
             
       <div class="row">
           <div class="slider">
               <ul class="slides">
                   @foreach ($imovel->galeria as $imagem)
                    
                   <li>
                       <img src="{{asset($imagem->imagem)}}" alt="" srcset="">
                       <div class="caption {{$direcaoImagem[rand(0,2)]}}">
                        <h3>{{$imagem->titulo}}</h3>
                        <h5>{{$imagem->descricao}}</h5>
                    </div>
                   </li>
                   @endforeach
               </ul>
           </div>
       </div>
       <div class="row" align = "center">
        <button class="btn blue" onclick="sliderPrev()">Anterior</button>
        <button class="btn blue" onclick="sliderNext()">Proximo</button>
       </div>
       @else
           <img src="{{asset($imovel->image)}}" class="responsive-img" alt="">  
       @endif
     </div>
     <div class="col s12 m4">
         <h4>{{$imovel->titulo}}</h4>
         <blockquote>
            {{$imovel->descricao}}
                 </blockquote>
         <p><b>Código:</b>{{$imovel->id}}</p>
         <p><b>Status:</b>{{$imovel->status}}</p>
         <p><b>Tipo:</b>{{$imovel->tipo->titulo}}</p>
         <p><b>Endereço:</b>{{$imovel->endereco}}</p>
         <p><b>CEP:</b>{{$imovel->ceo}}</p>
         <p><b>Cidade:</b>{{$imovel->cidade->nome}}</p>
         <p><b>Valor:</b>R${{$imovel->valor}}</p>
         <a class="btn deep-orange darken-1" href="{{route('site.contato')}}">Entre em contato</a>
    </div>
 </div>

 <div class="row section">
<div class="col s12 m8">
    <div class="video-container">
        {!!$imovel->mapa!!}
    </div>
</div>
<div class="col s12 m4">
<h4>Detalhes</h4>
<p>{{$imovel->detalhes}}</p>
</div>
 </div>
</div>


@endsection
