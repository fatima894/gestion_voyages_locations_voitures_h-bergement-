@extends('layouts.Head')


@section('body')






<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: rgba(228, 241, 241, 0.67)">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->


      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/flights">Voyages</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/houses">Hébergements</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/cars">Voitures</a>
          </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @if (Auth::user()->user_type == "admin")
                                      <a class="dropdown-item" href="/hotels">Management</a>
                                  @endif
                                  @if (Auth::user()->user_type == "secretary" || "admin" )
                                      <a class="dropdown-item" href="/Secretary/houses_managment">Tableau du bord Secretaire</a>
                                  @endif
                                  @if (Auth::user()->user_type == "admin" || "secretary")
                                      <a class="dropdown-item" href="/customer/dashboard/flights">Dashboard Customer</a>
                                  @endif
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




        <main class="py-4">
            <div class="row">



            @if(Auth::check())
                <div class="col-2">
                @yield('sideMenu')

                </div>

                @endif
                <div class="col-10 px-5">@yield('content')</div>

            </div>
        </main>
    </div>
</body>
@yield('scripts')
</html>



@endsection
