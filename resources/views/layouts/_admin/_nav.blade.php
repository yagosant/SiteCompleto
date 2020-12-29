<nav>
    <div class="nav-wrapper  red darken-2">
        <div class="container">
      <a href="{{route('admin.login')}}" class="brand-logo">Administração</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="{{route('admin.principal')}}">Inicio</a></li>
        <li><a class="grey-text text-lighten-3" target="blank" href="{{route('site.home')}}">Site</a></li>
        @if(Auth::guest())
        <li><a href="{{route('admin.login')}}">Login</a></li>
        @else


        <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">{{Auth::user()->name}} <i class="material-icons right">arrow_drop_down</i></a></li>

        <ul id="dropdown1" class="dropdown-content">
          <li><a href="#!">{{ Auth::user()->name }}</a></li>
              <li><a href="{{route('admin.imoveis')}}">Imóveis</a></li>
              <li><a href="{{route('admin.tipos')}}">Tipos</a></li>
              <li><a href="{{route('admin.cidades')}}">Cidades</a></li>
              <li><a href="{{route('admin.slides')}}">Slides</a></li>
              @can('usuario_listar')
              <li><a href="{{route('admin.usuarios')}}">Usuários</a></li>
              @endcan
              @can('papel_listar')
              <li><a href="{{route('admin.papel')}}">Papel</a></li>
              @endcan
              <li><a href="{{route('admin.paginas')}}">Páginas</a></li>
            </ul>

            <li><a href="{{ route('admin.login.sair') }}">Sair</a></li>
            
        @endif
      </ul>
    </div>
    </div>
    
    
  <ul class="sidenav" id="mobile-demo">
    <li><a href="{{route('admin.principal')}}">Inicio</a></li>
    <!-- verifica se tem um user logado, caso sim mostra o nome do usuário-->
    @if(Auth::guest())
    <li><a href="{{route('admin.login')}}">Login</a></li>
    <li><a class="grey-text text-lighten-3" target="blank" href="{{route('site.home')}}">Site</a></li>
    @else
    <li><a href="#">{{Auth::user()->name}}</a></li>
    <li><a href="{{route('admin.usuarios')}}">Usuários</a></li>
    <li><a href="{{route('admin.papel')}}">Papeis-Cargos</a></li>
    <li><a href="{{route('admin.imoveis')}}">Imoveis</a></li>
    <li><a href="{{route('admin.cidades')}}">Cidades</a></li>
    <li><a href="{{route('admin.tipos')}}">Tipos</a></li>
    <li><a href="{{route('admin.slides')}}">Slides</a></li>
    <li><a href="{{route('admin.paginas')}}">Páginas</a></li>
    <li><a href="{{route('admin.login.sair')}}">Sair</a></li>
    @endif
   
  </ul>
  </nav>
