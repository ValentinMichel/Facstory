<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> {{ config('app.name', 'fkjgherjkgh') }}  </title>
    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/creaH.css') }}" rel="stylesheet">
    <link href="{{ asset('css/page-histoire.css') }}" rel="stylesheet">
    <link href="{{ asset('css/creaC.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lire.css') }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

</head>
<body>
<header>
</header>
<!-- Authentication Links -->

<div class="header"  id="main-header">
    <div id="logo">
        <a href="{{ url('/') }}">
            <img class="idlogo" src="../img/logo-blanc.png" width="50">
           FACSTORY <!-- {{ config('app.name', 'Laravel') }} -->
        </a>
    </div>

    <div class="header-toggle">
    <a href="#main-header" class="header-toggle-open"><img src="../img/menu.png" width="30"></a>
    <a href="#" class="header-toggle-close"><img src="../img/menu-close.png" width="30"></a>

    </div>

    <ul>

        @guest
            <li><a href="{{ route('login') }}">Se connecter</a></li>
            <li><a href="{{ route('register') }}">S'enregistrer</a></li>
            @else

                <li><div class="affiche-login"> <i class="far fa-user"></i>  Bonjour <span class="name">{{ Auth::user()->name }} ! </span> </div><li>
                @if (Auth::user())
                    <li><a href="{{ route('creer_histoire') }}">Ajouter une histoire</a></li>
                    <li><a href="{{ route('creer_chapitre') }}">Ajouter un chapitre</a></li>
                    <li><a href="{{ route('mes_histoires') }}">Mes histoires</a></li>

                @endif
                <li><a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                        Déconnexion
                    </a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                @endguest
    </ul>

</div>
<div id="main">
    @yield('content')
</div>
<!-- Scripts -->
<script src="{{ asset('js/jquery.js') }}"></script>


<script src="{{ asset('js/main.js') }}"></script>

<script>
    $(window).on('scroll', function () {
        var menu_area = $('.header');
        if ($(window).scrollTop() > 200) {
            menu_area.addClass('black');
        } else {
            menu_area.removeClass('black');
        }

    });

</script>
</body>
</html>