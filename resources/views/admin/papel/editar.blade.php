@extends('layouts.app')

@section('content')
<div class="row">
    <nav>
        <div class="nav-wrapper grey">
          <div class="col s12">
            <a href="{{route('admin.principal')}}" class="breadcrumb">Inicio</a>
            <a href="{{route('admin.papel')}}" class="breadcrumb">Lista de Papéis</a>
            <a class="breadcrumb">Editar Papel</a>
            
          </div>
        </div>
      </nav>
</div>
<div class="container">
    <h2 class="center">Editar Papel</h2>
    <div class="row">
        <form action="{{route('admin.papel.atualizar',$registro->id)}}" method="post">

        {{csrf_field()}}

        <input type="hidden" name="_method" value="put">
        <!-- Reutilizando o form já criado -->
        @include('admin.papel._form')
        <button type="submit" class = "btn blue">Alterar</button>
        </form>
    </div>
</div>
    
@endsection