@extends('layouts.app')

@section('content')
<div class="row">
    <nav>
        <div class="nav-wrapper grey">
          <div class="col s12">
            <a href="{{route('admin.principal')}}" class="breadcrumb">Inicio</a>
            <a href="{{route('admin.tipos')}}" class="breadcrumb">Lista de Tipos</a>
            <a class="breadcrumb">Adicionar Tipo</a>
            
          </div>
        </div>
      </nav>
</div>
<div class="container">
    <h2 class="center">Adicionar Tipo</h2>
    <div class="row">
        <form action="{{route('admin.tipos.salvar')}}" method="post">

        {{csrf_field()}}

        <!-- Reutilizando o form já criado -->
        @include('admin.tipos._form')
        <button type="submit" class = "btn blue">Adicionar</button>
        </form>
    </div>
</div>
    
@endsection