@extends('layouts.app')

@section('content')
<div class="row">
    <nav>
        <div class="nav-wrapper grey">
          <div class="col s12">
            <a href="{{route('admin.principal')}}" class="breadcrumb">Inicio</a>
            <a href="{{route('admin.imoveis')}}" class="breadcrumb">Lista de Imoveis</a>
            <a class="breadcrumb">Galeria de Imagens</a>
            
          </div>
        </div>
      </nav>
</div>
    <div class="container">
        <h2 class="center">Galeria de Imagens</h2>

    
    <div class="row">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Desrição</th>
                    <th>Imagem</th>
                    <th>Ordem</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($registros as $registro)
                <tr>
                    <td>{{$registro->id}}</td>
                    <td>{{$registro->titulo}}</td>
                    <td>{{$registro->descricao}}</td>
                    <td><img width="100" src="{{asset($registro->imagem)}}" alt="Imagem Imovel"></td>
                    <td>{{$registro->ordem}}</td>
                    <td>
                        <a href="{{route('admin.galerias.editar',$registro->id)}}" class="btn deep-orange darken-1">Editar</a>
                        <a href="javascript: if(confirm('Deseja deletar esse registro?')){
                        window.location.href = '{{route('admin.galerias.deletar', $registro->id)}}'}"
                        class="btn red darken-1">Deletar</a>
                    
                    </td>
                   
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <a href="{{route('admin.galerias.adicionar',$imovel->id)}}" class = "btn blue">Adicionar Galeria</a>
    </div>
    </div>
        
@endsection