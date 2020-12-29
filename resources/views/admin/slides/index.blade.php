@extends('layouts.app')

@section('content')
<div class="row">
    <nav>
        <div class="nav-wrapper grey">
          <div class="col s12">
            <a href="{{route('admin.principal')}}" class="breadcrumb">Inicio</a>
            
            <a class="breadcrumb">Lista de Imagens</a>
            
          </div>
        </div>
      </nav>
</div>
    <div class="container">
        <h2 class="center">Lista de Imagens</h2>

    
    <div class="row">
        <table>
            <thead>
                <tr>
                    <th>Ordem</th>
                    <th>Nome</th>
                    <th>Desrição</th>
                    <th>Publicado</th>
                    <th>Imagem</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($registros as $registro)
                <tr>
                    <td>{{$registro->ordem}}</td>
                    <td>{{$registro->titulo}}</td>
                    <td>{{$registro->descricao}}</td>
                    <td>{{$registro->publicado}}</td>
                    <td><img width="100" src="{{asset($registro->imagem)}}" alt="Imagem Imovel"></td>
                    <td>
                        <a href="{{route('admin.slides.editar',$registro->id)}}" class="btn deep-orange darken-1">Editar</a>
                        <a href="javascript: if(confirm('Deseja deletar esse registro?')){
                        window.location.href = '{{route('admin.slides.deletar', $registro->id)}}'}"
                        class="btn red darken-1">Deletar</a>
                    
                    </td>
                   
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <a href="{{route('admin.slides.adicionar')}}" class = "btn blue">Adicionar IMagem</a>
    </div>
    </div>
        
@endsection