@extends('layouts.app')

@section('content')
<div class="row">
    <nav>
        <div class="nav-wrapper grey">
          <div class="col s12">
            <a href="{{route('admin.principal')}}" class="breadcrumb">Inicio</a>
            <a class="breadcrumb">Lista de Cidades</a>
            
          </div>
        </div>
      </nav>
</div>
    <div class="container">
        <h2 class="center">Lista de Cidades</h2>

       
    
    <div class="row">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Estado</th>
                    <th>Sigla Estado</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($registros as $registro)
                <tr>
                    <td>{{$registro->id}}</td>
                    <td>{{$registro->nome}}</td>
                    <td>{{$registro->estado}}</td>
                    <td>{{$registro->sigla_estado}}</td>
                    
                    <td>
                        <a href="{{route('admin.cidades.editar',$registro->id)}}" class="btn deep-orange darken-1">Editar</a>
                        <a href="javascript: if(confirm('Deseja deletar esse registro?')){
                        window.location.href = '{{route('admin.cidades.deletar', $registro->id)}}'}"
                        class="btn red darken-1">Deletar</a>
                    
                    </td>
                   
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <a href="{{route('admin.cidades.adicionar')}}" class = "btn blue">Adicionar Cidade</a>
    </div>
    </div>
        
@endsection