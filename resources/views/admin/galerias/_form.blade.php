
@if (isset($registro->imagem))
 
<div class="input-field">
    <input type="text" name="titulo" class="validate" id="" value="{{isset($registro->titulo) ? $registro->titulo:''}}">
    <label for="titulo">Nome do Imovel</label>
</div>

<div class="input-field">
    <input type="text" name="descricao" class="validate" id="" value="{{isset($registro->descricao) ? $registro->descricao:''}}">
    <label for="titulo">Descrição</label>
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
        <img src="{{asset($registro->imagem)}}" width="120">      
    </div>
</div>

<div class="input-field">
    <input type="text" name="ordem" class="validate" id="" value="{{isset($registro->ordem) ? $registro->ordem:''}}">
    <label for="titulo">Ordem</label>
</div>

@else

<!--Submete a imagem do PC-->
<div class="row">
    <div class="file-field input-field col m12 s12">
        <div class="btn deep-orange">
            <span>Upload de Imagens</span>
            <input type="file" multiple name="imagens[]">
            Selecionar
        </div>
        <div class="file-path-wrapper">
            <input type="text" name="" class="file-path validate">
        </div>
    </div>

</div>

@endif