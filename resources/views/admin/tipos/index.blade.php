@extends('layouts.app')

@section('content')
<div class="row">
    <nav>
        <div class="nav-wrapper grey">
          <div class="col s12">
            <a href="{{route('admin.principal')}}" class="breadcrumb">Inicio</a>
            <a class="breadcrumb">Lista de Tipos</a>
            
          </div>
        </div>
      </nav>
</div>
    <div class="container">
        <h2 class="center">Lista de Tipos</h2>

       
    
    <div class="row">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($registros as $registro)
                <tr>
                    <td>{{$registro->id}}</td>
                    <td>{{$registro->titulo}}</td>
                    
                    <td>
                        <a href="{{route('admin.tipos.editar',$registro->id)}}" class="btn deep-orange darken-1">Editar</a>
                        <a href="javascript: if(confirm('Deseja deletar esse registro?')){
                        window.location.href = '{{route('admin.tipos.deletar', $registro->id)}}'}"
                        class="btn red darken-1">Deletar</a>
                    
                    </td>
                   
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <a href="{{route('admin.tipos.adicionar')}}" class = "btn blue">Adicionar Tipo</a>
    </div>
    </div>
        
@endsection