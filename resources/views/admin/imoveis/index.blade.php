@extends('layouts.app')

@section('content')
<div class="row">
    <nav>
        <div class="nav-wrapper grey">
          <div class="col s12">
            <a href="{{route('admin.principal')}}" class="breadcrumb">Inicio</a>
            <a class="breadcrumb">Lista de Imovéis</a>
            
          </div>
        </div>
      </nav>
</div>
    <div class="container">
        <h2 class="center">Lista de Imovéis</h2>

    
    <div class="row">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Status</th>
                    <th>Tipos</th>
                    <th>Cidade</th>
                    <th>Valor</th>
                    <th>Imagem</th>
                    <th>Publicar?</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($registros as $registro)
                <tr>
                    <td>{{$registro->id}}</td>
                    <td>{{$registro->titulo}}</td>
                    <td>{{$registro->status}}</td>
                    <td>{{$registro->tipo->titulo}}</td>
                    <td>{{$registro->cidade->nome}}</td>
                    <td>{{$registro->valor}}</td> 
                  {{--   <td>R$ {{ number_format($registro->valor,2,",",".") }}</td>  --}}
                    <td><img width="100" src="{{asset($registro->imagem)}}" alt="Imagem Imovel"></td>
                    <td>{{$registro->publica}}</td>
                    
                    
                    <td>
                        <a href="{{route('admin.imoveis.editar',$registro->id)}}" class="btn deep-orange darken-1">Editar</a>
                        <a href="{{route('admin.galerias',$registro->id)}}" class="btn deep-green darken-1">Galeria</a>
                        <a href="javascript: if(confirm('Deseja deletar esse registro?')){
                        window.location.href = '{{route('admin.imoveis.deletar', $registro->id)}}'}"
                        class="btn red darken-1">Deletar</a>
                    
                    </td>
                   
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <a href="{{route('admin.imoveis.adicionar')}}" class = "btn blue">Adicionar Imovél</a>
    </div>
    </div>
        
@endsection