@extends('layouts.app')

@section('content')
<div class="row">
    <nav>
        <div class="nav-wrapper grey">
          <div class="col s12">
            <a href="{{route('admin.principal')}}" class="breadcrumb">Inicio</a>
            <a href="{{route('admin.imoveis')}}" class="breadcrumb">Lista de Imoveis</a>
            <a href="{{route('admin.galerias', $imovel->id)}}" class="breadcrumb">Galeria de Imagem</a>
            <a class="breadcrumb">Adicionar Imagem</a>
            
          </div>
        </div>
      </nav>
</div>
<div class="container">
    <h2 class="center">Adicionar Imagem</h2>
    <div class="row">
        <form action="{{route('admin.galerias.salvar',$imovel->id)}}" method="post" enctype="multipart/form-data">

        {{csrf_field()}}

        <!-- Reutilizando o form já criado -->
        @include('admin.galerias._form')
        <button type="submit" class = "btn blue" enctype="multipart/form-data">Adicionar</button>
        </form>
    </div>
</div>
    
@endsection