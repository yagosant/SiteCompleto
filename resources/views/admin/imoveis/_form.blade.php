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
        @if (isset($registro->imagem))
        <img src="{{asset($registro->imagem)}}" width="120">
        @endif
    </div>
</div>

<div class="input-field">
    <select name="status">
        <!--Reaproveita os registros que estão no banco para fazer a validação-->
        <option value="aluga" {{(isset($registro->status) && $registro->status == 'aluga'  ? 'selected' : '')}}>Aluga</option>
        <option value="vende" {{(isset($registro->status) && $registro->status == 'vende'  ? 'selected' : '')}}>Vende</option>
    </select>
    <label>Status</label>
</div>

<div class="input-field">
    <select name="tipo_id">
        <!--com uma variavel existente no controller, traz todos os tipos cadastrados banco-->
        @foreach($tipos as $tipo)
            <option value="{{ $tipo->id }}" {{(isset($registro->tipo_id) && $registro->tipo_id == $tipo->id  ? 'selected' : '')}}>{{ $tipo->titulo }}</option>
        @endforeach
    </select>
    <label>Tipo de Imóvel</label>
</div>

<div class="input-field">
    <input type="text" name="endereco" class="validate" value="{{(isset($registro->endereco) ? $registro->endereco : '')}}">
    <label>Endereço</label>
</div>

<div class="input-field">
    <input type="text" name="cep" class="validate" value="{{(isset($registro->cep) ? $registro->cep : '')}}">
    <label>CEP (Ex: 96848-146)</label>
</div>

<div class="input-field">
    <select name="cidade_id">
                <!--com uma variavel existente no controller, traz todos os tipos cadastrados banco-->
        @foreach($cidades as $cidade)
        <option value="{{ $cidade->id }}" {{(isset($registro->cidade_id) && $registro->cidade_id == $cidade->id  ? 'selected' : '')}}>{{ $cidade->nome }}</option>
        @endforeach
    </select>
    <label>Cidade</label>
</div>

<div class="input-field">
    <input type="text" name="valor" class="validate" value="{{(isset($registro->valor) ? $registro->valor : '')}}">
    <label>Valor (Ex: 234.90)</label>
</div>

<div class="input-field">
    <input type="text" name="dormitorios" class="validate" value="{{(isset($registro->dormitorios) ? $registro->dormitorios : '')}}">
    <label>Dormitórios (Ex: 3)</label>
</div>

<div class="input-field">
    <input type="text" name="detalhes" class="validate" value="{{(isset($registro->detalhes) ? $registro->detalhes : '')}}">
    <label>Detalhes (Ex: Sacada: 1 - Banheiro: 2 - Sala de Jantar - Churrasqueira)</label>
</div>

<div class="input-field">
<textarea name="mapa" class="materialize-textarea">
    {{(isset($registro->mapa) ? $registro->mapa : '')}}
</textarea>
    <label>Mapa (Cole o iframe do Google Maps)</label>
</div>

<div class="input-field">
    <select name="publica">
        <option value="nao" {{(isset($registro->publica) && $registro->publica == 'nao'  ? 'selected' : '')}}>Não</option>
        <option value="sim" {{(isset($registro->publica) && $registro->publica == 'sim'  ? 'selected' : '')}}>Sim</option>
    </select>
    <label>Publicar?</label>
</div>



