@extends('layouts.app')

@section('content')
<div class="row">
    <nav>
        <div class="nav-wrapper grey">
          <div class="col s12">
            <a href="{{route('admin.principal')}}" class="breadcrumb">Inicio</a>
            <a href="{{route('admin.cidades')}}" class="breadcrumb">Lista de Cidades</a>
            <a class="breadcrumb">Adicionar Tipo</a>
            
          </div>
        </div>
      </nav>
</div>
<div class="container">
    <h2 class="center">Adicionar Cidade</h2>
    <div class="row">
        <form action="{{route('admin.cidades.salvar')}}" method="post">

        {{csrf_field()}}

        <!-- Reutilizando o form já criado -->
        @include('admin.cidades._form')
        <button type="submit" class = "btn blue">Adicionar</button>
        </form>
    </div>
</div>
    
@endsection