@extends('layouts.app')

@section('content')
<div class="row">
    <nav>
        <div class="nav-wrapper grey">
          <div class="col s12">
            <a href="{{route('admin.principal')}}" class="breadcrumb">Inicio</a>
            <a class="breadcrumb">Lista de páginas</a>
            
          </div>
        </div>
      </nav>
</div>
    <div class="container">
        <h2 class="center">Lista de páginas</h2>

       
    
    <div class="row">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Descrição</th>
                    <th>Tipo</th>
                    <th>Ação</th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach ($paginas as $pagina)
                <tr>
                    <td>{{$pagina->id}}</td>
                    <td>{{$pagina->titulo}}</td>
                    <td>{{$pagina->descricao}}</td>
                    <td>{{$pagina->tipo}}</td>
                    <td>
                        <a href="{{route('admin.paginas.editar',$pagina->id)}}" class="btn deep-orange darken-1">Editar</a>
                                            
                    </td>
                   
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    </div>
        
@endsection