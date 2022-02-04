<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="">image
            <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

            <title>Laravel CRUD</title>

            <!-- Custom styles for this template -->
            <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet" type="text/css" />
            <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
            <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
            <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
            <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
            <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
            <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
            <meta name="theme-color" content="#7952b3">


        </head>
        <body data-dashlane-rid="480cb2c1aaceacbc" data-form-type="">
            <header class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
                <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Voiture</a>
                <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <form class="col-sm" action="">
                    <div class="input-group">
                        <input class="input-group-text form-control-dark col-8" type="text" placeholder="Rechercher une voiture par marque et/ou modèle" value="{{ $search }}" name ="search" id="search" action="{{ route('index') }}">
                        <select class="form-select w-25" id="search2" name="search2">
                            @foreach ($motors as $motor)
                                <option selected="{{ $search2 == $motor->id }}" value="{{ $motor->id }}">{{ $motor->type }}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-outline-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </button>
                    </div>

                </form>
                <div class="navbar-nav">
                    <div class="nav-item text-nowrap">
                        <a  class="nav-link px-3" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </header>
            <div class="container">
                <div class="row">
                  <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    <div class="position-sticky pt-3">
                      <ul class="nav flex-column">
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="{{ route('cars.index') }}">
                            <span data-feather="home"></span>
                            Dashboard
                          </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}">
                              <span data-feather="home"></span>
                              Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('user.index') }}">
                              <span data-feather="home"></span>
                              Utilisateurs
                            </a>
                          </li>
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="{{ route('preview') }}">
                            <span data-feather="file"></span>
                            Voitures
                          </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('myCars') }}">
                                <span data-feather="file"></span>
                                Mes voitures
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('preview') }}">
                                <span data-feather="file"></span>
                                Favoris
                            </a>
                        </li>
                    </div>
                  </nav>
                  <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 uper">
                    @yield('content')
                  </main>
                </div>
            </div>
            <script src="{{ asset('js/app.js') }}" type="text/js"></script>
            <script src="{{ asset('js/dashboard.js') }}" type="text/js"></script>
        </body>
    </html>
