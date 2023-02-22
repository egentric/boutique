<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'ScubaShop' }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href=" {{ asset('css/app.css') }}">
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>

<body>
    <div id="app" class="visiteur">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ 'ScubaStore' }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('indexCombi') }}">Combinaison</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('indexStab') }}">Gilet stabilisateur</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('indexDet') }}">Détendeur</a>
                        </li>

                    </ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item dropdown">


                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img src="/storage/uploads/{{ Auth::user()->picture }}" alt="" width="40"> {{ Auth::user()->pseudo }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                {{-- <a class="dropdown-item" href="{{ route('users.edit', $user = Auth::user())}}">Mon compte</a> --}}
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>



    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 mt-4 bg-secondary">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Menu</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="{{ route('home')}}" class="nav-link align-middle px-0 text-light">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Accueil</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard')}}" data-bs-toggle="collapse" class="nav-link px-0 align-middle text-light">
                                <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span> </a>
                            <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="{{ route('articles.index')}}" class="nav-link px-0 text-light"><i class="fs-4 bi bi-tag"></i> <span class="d-none d-sm-inline">Articles</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('promos.index')}}" class="nav-link px-0 text-light"><i class="fs-4 bi bi-star"></i> <span class="d-none d-sm-inline">Promos</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('ranges.index')}}" class="nav-link px-0 text-light"><i class="fs-4 bi bi-bookmarks"></i> <span class="d-none d-sm-inline">Catégories</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('sizes.index')}}" class="nav-link px-0 text-light"><i class=" fs-4 bi bi-aspect-ratio"></i> <span class="d-none d-sm-inline">Tailles</span></a>
                                </li>
                            </ul>
                        </li>


                        <li>
                            <a href="#" class="nav-link px-0 align-middle text-light">
                                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Utilisateur</span> </a>
                        </li>
                        <li>
                            <a href="{{ route('users.edit', $user = Auth::user())}}" class="nav-link px-0 align-middle text-light">
                                <i class="fs-4 bi bi-person"></i> <span class="ms-1 d-none d-sm-inline">Mon Compte</span> </a>
                        </li>
                    </ul>
                    <hr>
                    {{-- <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    </form> --}}
                    {{-- <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1">loser</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li> --}}


                    {{-- <button type="submit">Déconnexion</button> --}}
                    {{-- <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col py-3">--}}
 
                </div>
            </div>
            <div class="row  flex-nowrap">
                       @yield('content')
                   </div>
        </div>
                   
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>