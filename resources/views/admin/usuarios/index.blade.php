@extends('layouts.app')

@section('content')
<div class="row">
    <nav>
        <div class="nav-wrapper grey">
          <div class="col s12">
            <a href="{{route('admin.principal')}}" class="breadcrumb">Inicio</a>
            <a class="breadcrumb">Lista de Usuários</a>
            
          </div>
        </div>
      </nav>
</div>
    <div class="container">
        <h2 class="center">Lista de Usuários</h2>

       
    
    <div class="row">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{$usuario->id}}</td>
                    <td>{{$usuario->name}}</td>
                    <td>{{$usuario->email}}</td>
                    <td>
                        @can('usuario_editar')
                        <a class="btn orange" href="{{ route('admin.usuarios.editar',$usuario->id) }}">Editar</a>
                        <a class="btn blue" href="{{ route('admin.usuarios.papel',$usuario->id) }}">Papel</a>
                        @endcan
                        @can('usuario_deletar')
                        <a class="btn red" href="javascript: if(confirm('Deletar esse registro?')){ window.location.href = '{{ route('admin.usuarios.deletar',$usuario->id) }}' }">Deletar</a>
                        @endcan
                    </td>
                   
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <a href="{{route('admin.usuarios.adicionar')}}" class = "btn blue">Adicionar Usuários</a>
    </div>
    </div>
        
@endsection