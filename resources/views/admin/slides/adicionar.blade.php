@extends('layouts.app')

@section('content')
<div class="row">
    <nav>
        <div class="nav-wrapper grey">
          <div class="col s12">
            <a href="{{route('admin.principal')}}" class="breadcrumb">Inicio</a>
            <a href="{{route('admin.slides')}}" class="breadcrumb">Lista de Slides</a>
            <a class="breadcrumb">Adicionar Slide</a>
            
          </div>
        </div>
      </nav>
</div>
<div class="container">
    <h2 class="center">Adicionar Slide</h2>
    <div class="row">
        <form action="{{route('admin.slides.salvar')}}" method="post" enctype="multipart/form-data">

        {{csrf_field()}}

        <!-- Reutilizando o form já criado -->
        @include('admin.slides._form')
        <button type="submit" class = "btn blue" enctype="multipart/form-data">Adicionar</button>
        </form>
    </div>
</div>
    
@endsection