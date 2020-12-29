<footer class="page-footer  red darken-2" >
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Site Completo</h5>
          <p class="grey-text text-lighten-4"><img src="{{asset('img/bandeiras-bahamas.png')}}" width="500" alt=""></p>
        </div>
        <div class="col l4 offset-l2 s12">
          <h5 class="white-text">Links</h5>
          <ul>
            <li><a class="grey-text text-lighten-3" href="{{route('site.home')}}">Home</a></li>
            <li><a class="grey-text text-lighten-3" href="{{route('site.sobre')}}">Sobre</a></li>
            <li><a class="grey-text text-lighten-3" href="{{route('site.contato')}}">Contato</a></li>
            <li><a class="grey-text text-lighten-3" href="{{route('admin.login')}}" target="blank">Login</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      @2021 Dev - Grupo Bahamas
      <a class="grey-text text-lighten-4 right" href="#!"><img src="{{asset('img/logo-dev-team.png')}}" width="150" alt=""></a>
      </div>
    </div>
  </footer>