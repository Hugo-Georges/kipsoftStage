
@extends('layout2')

@section('content2')
<form action="{{ route('index') }}" method="GET">
</form>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company name</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" name ="search" id="search" action="{{ route('index') }}">
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a class="nav-link px-3" href="#">Sign out</a>
      </div>
    </div>
  </header>

<!--<div class="container-*">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Rechercher par marque et/ou modèle souhaité" name="search" required/>
        </div>
</div>
-->

<div class="container-fluid">
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
              <a class="nav-link active" aria-current="page" href="{{ route('listCars') }}">
                <span data-feather="file"></span>
                Voitures
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="shopping-cart"></span>
                Products
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="users"></span>
                Customers
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="bar-chart-2"></span>
                Reports
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="layers"></span>
                Integrations
              </a>
            </li>
          </ul>

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Saved reports</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
              <span data-feather="plus-circle"></span>
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Current month
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Last quarter
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Social engagement
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Year-end sale
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
              <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
              <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
              <span data-feather="calendar"></span>
              This week
            </button>
          </div>
        </div>
        <canvas class="my-4 w-100 chartjs-render-monitor" id="myChart" style="display: block; width: 1125px; height: 475px;" width="1125" height="475"></canvas>

        <h2>Section title</h2>

        <div class="table-responsive text-center">
            <table class="table table-striped table-sm"><!--Tableau avec l'ensemble des voitures -->
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Marque</td>
                        <td>Modele</td>
                        <td>Prix</td>
                        <td>Année</td>
                        <td>Kilométrage</td>
                        <td colspan="3">Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cars as $car)
                    <tr>
                        <td>{{$car->id}}</td>
                        <td>{{$car->marque}}</td>
                        <td>{{$car->modele }}
                        <td>{{$car->prix}}</td>
                        <td>{{ $car->annee }}</td>
                        <td>{{ $car->km }}</td>
                        <td><a href="{{ route('cars.show', $car->id)}}" class="btn btn-outline-info">Détail</a></td><!--Pour voir le détail d'une voiture-->
                        <td><a href="{{ route('cars.edit', $car->id)}}" class="btn btn-outline-secondary">Modifier</a></td><!--Pour modifier une voiture-->
                        <td>
                            <form action="{{ route('cars.destroy', $car->id)}}" method="post"><!--Pour supprimer une voiture-->
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger" type="submit">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <ul class="pagination justify-content-center mb-4">
            {{$cars->links("pagination::bootstrap-4")}}
        </ul>
        <a href="{{ route('cars.create')}}" class="btn btn-outline-success">Ajouter</a>
        <div class="d-md-flex justify-content-md-end">
            <a href="{{ route('index') }}" class="btn btn-outline-primary pull-right" role="button">Retour</a>
        </div>
      </main>
    </div>
</div>

@endsection
