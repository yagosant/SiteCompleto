@extends('layouts.app')

@section('content')
<div class="row">
    <nav>
        <div class="nav-wrapper grey">
          <div class="col s12">
            <a href="{{route('admin.principal')}}" class="breadcrumb">Inicio</a>
            <a href="{{route('admin.usuarios')}}" class="breadcrumb">Lista de Usuários</a>
            <a class="breadcrumb">Adicionar Usuários</a>
            
          </div>
        </div>
      </nav>
</div>
<div class="container">
    <h2 class="center">Adicionar Usuários</h2>
    <div class="row">
        <form action="{{route('admin.usuarios.salvar')}}" method="post">

        {{csrf_field()}}

        <!-- Reutilizando o form já criado -->
        @include('admin.usuarios._form')
        <button type="submit" class = "btn blue">Adicionar</button>
        </form>
    </div>
</div>
    
@endsection