@extends('layouts.app')

@section('content')
<div class="row">
    <nav>
        <div class="nav-wrapper grey">
          <div class="col s12">
            <a href="{{route('admin.principal')}}" class="breadcrumb">Inicio</a>
            <a href="{{route('admin.tipos')}}" class="breadcrumb">Lista de TIpos</a>
            <a class="breadcrumb">Editar Tipos</a>
            
          </div>
        </div>
      </nav>
</div>
<div class="container">
    <h2 class="center">Editar Tipo</h2>
    <div class="row">
        <form action="{{route('admin.tipos.atualizar',$registro->id)}}" method="post">

        {{csrf_field()}}

        <input type="hidden" name="_method" value="put">
        <!-- Reutilizando o form já criado -->
        @include('admin.tipos._form')
        <button type="submit" class = "btn blue">Alterar</button>
        </form>
    </div>
</div>
    
@endsection