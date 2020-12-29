<div class="row section">
    <h3 align ="center"> Imovéis</h3>
    <div class="divider"></div>
    <br>
    @include('layouts._site._filtros')
</div>

@foreach ($imoveis as $imovel)
    
<div class="row section">
    <div class="col s12 m3">
        <div class="card">
            <div class="card-image">
                <a href="{{route('site.imovel',[$imovel->id, str_slug($imovel->titulo,'_')])}}"><img src="{{asset($imovel->imagem)}}" alt="{{$imovel->titulo}}"></a>
            </div>
            <div class="card-content">
                <p><b class = "deep-orange-text darken-1">{{$imovel->status}}</b></p>
                <p><b>{{$imovel->titulo}}</b></p>
                <p>{{$imovel->descrição}}</p>
               {{--  <p>R${{number_format($imovel->valor,2,",",".") }}</p> --}}
               <p>R${{$imovel->valor}}</p>
            </div>
            <div class="card-action">
                <a href="{{route('site.imovel',[$imovel->id, str_slug($imovel->titulo,'_')])}}">Ver Mais</a>
            </div>
        </div>
    </div>

    @endforeach

</div>

@if($pagination)
<div class="row" align="center">
    {{$imoveis->links()}}
</div>
@endif
