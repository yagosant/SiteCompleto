@extends('layouts.app')

@section('content')
<div class="row">
    <nav>
        <div class="nav-wrapper grey">
          <div class="col s12">
            <a href="{{route('admin.principal')}}" class="breadcrumb">Inicio</a>
            <a href="{{route('admin.imoveis')}}" class="breadcrumb">Lista de Imoveis</a>
            <a class="breadcrumb">Editar Imovel</a>
            
          </div>
        </div>
      </nav>
</div>
<div class="container">
    <h2 class="center">Editar Imovel</h2>
    <div class="row">
        <form action="{{route('admin.imoveis.atualizar',$registro->id)}}" method="post" enctype="multipart/form-data">

        {{csrf_field()}}

        <input type="hidden" name="_method" value="put">
        <!-- Reutilizando o form já criado -->
        @include('admin.imoveis._form')
        <button type="submit" class = "btn blue">Alterar</button>
        </form>
    </div>
</div>
    
@endsection