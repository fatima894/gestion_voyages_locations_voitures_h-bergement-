<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        .navbar-brand{
            font-family:  "Lucida Console", "Courier New", monospace;
        }
        .nav-link :hover{
            color: blueviolet;
        }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
</head>
<body>






    <div class="website-container">

<!-- Start Navbar  -->

<nav class="navbar navbar-expand-lg navbar-light shadow-sm sticky-top" style="background-color:rgba(255, 255, 255, 0.596) " >
    <div class="container-fluid">
      <a class="navbar-brand" href="/" style=""> <img src="img/Zlogo.jpg" style="width: 18%" alt="ZreLaXVoyAges"> </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/"> <button class="btn btn-white border-0 w-100 py-3" type="submit"> <b>Accueil</b> </button></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/flights"><button class="btn btn-white border-0 w-100 py-3" type="submit"> <b>Voyages</b> </button></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/houses"><button class="btn btn-white border-0 w-100 py-3" type="submit"> <b>Hébergements</b> </button></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/cars"><button class="btn btn-white border-0 w-100 py-3" type="submit"> <b>Voitures</b> </button></a>
          </li>
        </ul>


        <ul class="navbar-nav ms-auto">
                          <!-- Authentication Links -->
                          @guest
                              @if (Route::has('login'))
                                  <li class="nav-item">
                                      <a class="nav-link" href="{{ route('login') }}"><button class="btn btn-white border-0 w-100 py-3" type="submit"> <b>{{ __('Login') }}</b> </button></a>
                                  </li>
                              @endif

                              @if (Route::has('register'))
                                  <li class="nav-item">
                                      <a class="nav-link" href="{{ route('register') }}"><button class="btn btn-white border-0 w-100 py-3" type="submit"> <b>{{ __('Register') }}</b> </button></a>
                                  </li>
                              @endif
                          @else

                              <li class="nav-item dropdown btn border-0 w-100" style="background-color: rgba(148, 143, 143, 0.342)">
                                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <b>{{ Auth::user()->name }}</b>

                                  </a>
                                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                  @if (Auth::user()->user_type == "admin")
                                      <a class="dropdown-item" href="/hotels">Management</a>
                                  @endif
                                  @if (Auth::user()->user_type == "secretary"|| Auth::user()->user_type == "admin")
                                      <a class="dropdown-item" href="/Secretary/houses_managment">Secretary Dashboard</a>
                                  @endif
                                      <a class="dropdown-item" href="/customer/dashboard">Dashboard</a>
                                      <a class="dropdown-item" href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                          {{ __('Logout') }}
                                      </a>

                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                          @csrf
                                      </form>
                                  </div>
                              </li>
                          @endguest
                      </ul>


      </div>
    </div>
  </nav>
  <!-- End Navbar  -->

<div>

@yield('main')


</div>


</div>

</body>
</html>
