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
                <form class="col-sm" action="{{ route('cars.index') }}">
                <input class="form-control form-control-dark w-100" type="text" placeholder="Rechercher une voiture par marque et/ou modèle" name ="search" id="search" action="{{ route('index') }}">
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
                          <a class="nav-link active" aria-current="page" href="{{ route('index') }}">
                            <span data-feather="home"></span>
                            Dashboard
                          </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('index') }}">
                              <span data-feather="home"></span>
                              Dashboard
                            </a>
                          </li>
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="{{ route('listCars') }}">
                            <span data-feather="file"></span>
                            Voitures
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
