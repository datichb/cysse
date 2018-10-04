<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>
    <script src="{{ asset('js/ShaderBaseFunction.js') }}"></script>

    <title>{{ config('app.name', 'Cysse') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Sorts+Mill+Goudy" rel="stylesheet">
    <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
</head>
<body class="body">
    <div id="app">
        <div id="app-second">
            <nav class="navbar navbar-default navbar-static-top">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <div class="navbar-brand" style="">
                        <a class="dropbtn" style="text-decoration: none;color:rgba(0, 0, 0, 0.5);" href="{{ url('/') }}">
                            {{ config('app.name', 'Cysse') }}
                        </a>
                        <div class="dropdown-content">
                            <a href="{{ url('/mark') }}">La marque</a>
                            <a href="{{ url('/artiste') }}">L'artiste</a>
                        </div>
                    </div>
                    <div class="navbar-brand" style="">
                        <a class="dropbtn" style="text-decoration: none;color:rgba(0, 0, 0, 0.5);" href="{{ url('/collection') }}">
                            Les collections
                        </a>
                            <!-- <getcollection></getcollection> -->
                    </div>
                    @auth
                        @if(Auth::user()->isAdmin())
                        <div class="navbar-brand" style="">
                            <a class="dropbtn" style="text-decoration: none;color:rgba(0, 0, 0, 0.5);" href="#">
                                Création
                            </a>
                            <div class="dropdown-content">
                                <li>
                                    <a href="{{ url('/painting/create') }}">Créer un tableau</a>
                                    <a href="{{ url('/collection/create') }}">Créer une collection</a>
                                </li>
                            </div>
                        </div>
                        @endif
                    @endauth
                                
                    <div class="navbar-brand" style="">
                        <a class="dropbtn" style="text-decoration: none;color:rgba(0, 0, 0, 0.5);" href="#">
                            Sur mesure
                        </a>
                        <div class="dropdown-content">
                        <a href="#">Demandes particulières</a>
                        </div>
                    </div>

                    <div class="navbar-brand" style="">
                        <a class="dropbtn" style="text-decoration: none;color:rgba(0, 0, 0, 0.5);" href="{{ url('/contact') }}">
                            Contact
                        </a>
                    </div>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <li><img style='margin-top: 75%;' class="img" src="/icon/shopping-cart.svg" data-toggle="modal" data-target="#ModalCart"/></li>
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            @if(Auth::user()->isAdmin())
                                <li>
                                    <a href="{{ route('admin') }}" class="">Admin</a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ url('/home') }}">
                                        Votre espace
                                    </a>
                                </li>
                            @endif
                            
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->firstname }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>
            <!-- <cart></cart> -->
            @yield('content')

            <div class="footer footer-panel modal-footer">
                <p>®All rights reserved to Cysse.com. Made by Benjamin Datiche</p>
            </div>
        </div>
    </div>
    
    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>

<script type="text/javascript">
//main();
</script>

<style>
#preloader .logo polygon {
  fill: #fff;
}

    .body {
        height: 100vh;
    }
    #app {
        width: 90%;
        margin-left: 5%;
        border-left: solid;
        border-right: solid;
        height: 100%;
        overflow: hidden;
    }
    #app-second {
        width: 98.6%;
        margin-left: 0.7%;
        border-left: solid;
        border-right: solid;
        border-width: 1px;
        height: 100%;
    }

    .footer {
        border: solid 1px #e7e7e7;
        background-color: #f8f8f8;
        position:relative;
        bottom:0;
        width: 100%;
        padding-top: 0.2%;
        padding-bottom: 0.2%;
        height: 5%;
    }

    ::-webkit-scrollbar {
        width: 0px;
        background: transparent; /* make scrollbar transparent */
    }

    .cart {
        margin-top: 5%;
        margin-right: 5%;
        width: 11%;
        float: left;
    }

    .navbar-right{
        visibility: hidden;
        width: 25%;
    } 

    .navbar {
        height: 5%;
        margin: 0;
    }

    .dropbtn {
        font-size: 16px;
        border: none;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        margin-top: 1%;
        display: none;
        position: absolute;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        border-color: solid 1px #e7e7e7;
        z-index: 1;
    }
    
    .content {
        height: 91%;
        margin: 0;
        overflow-y: scroll;
        box-sizing: content-box;
        padding-left: 2%;
        padding-right: 2%;
        position: relative;
    }

    .dropdown-content a {
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        background-color: #f8f8f8;
        color: rgba(0, 0, 0, 0.498039);
    }

    .dropdown-content a:hover {background-color: #ddd;}

    .navbar-brand:hover .dropdown-content {display: block;}

    .navbar-brand:hover .dropbtn {
        color: black;
    }
</style>
</html>