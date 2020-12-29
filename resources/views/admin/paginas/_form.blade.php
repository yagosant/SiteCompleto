
<div class="input-field">
    <input type="text" name="titulo" class="validate" id="" value="{{isset($pagina->titulo) ? $pagina->titulo:''}}">
    <label for="titulo">Titulo</label>
</div>
<div class="input-field">
    <input type="text" name="descricao" class="validate" id="" value="{{isset($pagina->descricao) ? $pagina->descricao:''}}">
    <label for="descricao">Descrição</label>
</div>

@if (isset($pagina->email))
<div class="input-field">
    <input type="text" name="email" class="validate" id="" value="{{isset($pagina->email) ? $pagina->email:''}}">
    <label for="email">E-mail</label>
</div>
    
@endif

<div class="input-field">
    <textarea name="texto" id="" class="materialize-textarea"> {{isset($pagina->texto) ? $pagina->texto:''}}</textarea>
    <label for="texto">Texto</label>
</div>

<!--Submete a imagem do PC-->
<div class="row">
    <div class="file-field input-field col m6 s12">
        <div class="btn deep-orange">
            <input type="file" name="imagem">
            Selecionar
        </div>
        <div class="file-path-wrapper">
            <input type="text" name="" class="file-path validate">
        </div>
    </div>

    <div class="col m6 s12">
        @if (isset($pagina->imagem))
        <img src="{{asset($pagina->imagem)}}" width="120">
        @endif
    </div>

</div>

<div class="input-field">
    <textarea name="mapa" id="" class="materialize-textarea"> {{isset($pagina->mapa) ? $pagina->mapa:''}}</textarea>
    <label for="mapa">Mapa</label>
</div>
