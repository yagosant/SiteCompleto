<nav>
<div class="nav-wrapper  red darken-2 ">
<div class="container">
<a href="{{route('site.home')}}" class="brand-logo"><img src="{{asset('img/GRUPO_BAHAMAS.png')}}" width="150" alt=""></a>
<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
<ul class="right hide-on-med-and-down">
<li><a href="{{route('site.home')}}">Home</a></li>
<li><a href="{{route('site.sobre')}}">Sobre</a></li>
<li><a href="{{route('site.contato')}}">Contato</a></li>
<li><a href="{{route('admin.login')}}">Login</a></li>

</ul>

<ul class="sidenav" id="mobile-demo">
    <li><a href="{{route('site.home')}}">Home</a></li>
    <li><a href="{{route('site.sobre')}}">Sobre</a></li>
    <li><a href="{{route('site.contato')}}">Contato</a></li>
    <li><a href="{{route('admin.login')}}">Login</a></li>
</ul>

</div>
</div>
</nav>