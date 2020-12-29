<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
   {{--  <meta http-equiv="X-UA-Compatible" content="IE=edge"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">


<!-- Twitter Card data -->
<meta name="twitter:card" value="summary">

<!-- Open Graph data -->
<meta property="og:title" content="{{ isset($seo['titulo']) ? $seo['titulo'] : config('seo.titulo') }}" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ isset($seo['url']) ? $seo['url'] : config('app.url') }}" />
<meta property="og:image" content="{{ isset($seo['imagem']) ? $seo['imagem'] : config('seo.imagem') }}" />
<meta property="og:description" content="{{ isset($seo['descricao']) ? $seo['descricao'] : config('seo.descricao') }}" />


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      

    <!-- Styles -->
    {{-- <link href="/css/app.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{asset('lib/materialize/dist/css/materialize.css')}}">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    
      <header>
        
        @include('layouts._site._nav')

        </header>

        <main>

            <!-- valida se existe sessão -->
    @if(Session::has('mensagem'))
        <div class="container">
            <div class="row">
                <!-- cria um card onde a classe passada do controller vai definir a cor e a msg-->
                <div class="card {{Session::get('mensagem')['class']}}">
                    <div class="card-content" align = "center">
                        {{Session::get('mensagem')['msg']}}
                        </div>
                    </div>
                </div>
            </div>
    @endif
            @yield('content')
   
        </main>
        
        @include('layouts._site._footer')
        
    <!-- Scripts -->
    <script src="{{asset('lib/jquery/dist/jquery.js')}}"></script>
    <script src="{{asset('lib/materialize/dist/js/materialize.js')}}"></script>
    <script src="{{asset('/js/init.js')}}"></script>

</body>
</html>
