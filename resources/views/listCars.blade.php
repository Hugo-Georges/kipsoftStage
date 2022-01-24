@extends('layout2')

@section('content2')
      <main>
        <section class="py-5 text-center container">
          <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
              <h1 class="fw-light">Bienvenue</h1>
              <p class="lead text-muted">Ici vous pouvez vendre vos voitures ou acheter de nouvelles</p>
            </div>
          </div>
        </section>
        <div class="album py-5 bg-light">
          <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($cars as $car)
                <div class="col">

                        <div class="card shadow-sm">
                            <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="https://loremflickr.com/320/240/car">
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Marque : {{ $car->marque }}</li>
                                    <li class="list-group-item">Modele : {{ $car->modele }}</li>
                                    <li class="list-group-item">Anée de fabrication : {{ $car->annee }}</li>
                                    <li class="list-group-item">Kilométrage au compteur : {{ $car->km }} km</li>
                                    <li class="list-group-item">Description : {{ $car->description }}</li>
                                    <li class="list-group-item">Prix : {{ $car->prix }} €</li>
                                </ul>
                                <a href="{{ route('cars.show', $car->id)}}" class="btn btn-outline-info">Détail</a><!--Pour voir plus d'informations sur une voiture-->
                                <a href="{{ route('cars.edit', $car->id)}}" class="btn btn-outline-secondary">Modifier</a><!--Pour modifier une voiture-->
                                <form action="{{ route('cars.destroy', $car->id)}}" method="post"><!--Pour supprimer une voiture-->
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger" type="submit">Supprimer</button>
                                </form>
                            </div>
                        </div>

                    </div>
                    @endforeach
                </div>
            </div>
            <div>
            <a href="{{ route('cars.create')}}" class="btn btn-outline-success">Ajouter</a>
            </div>
                    <div class="d-md-flex justify-content-md-end">
                        <a href="{{ route('index') }}" class="btn btn-outline-primary pull-right" role="button">Retour</a>
                    </div>
            <ul class="pagination justify-content-center mb-4">
                {{$cars->links("pagination::bootstrap-4")}}
            </ul>
          </div>
        </div>

      </main>
        </div>
    </div>

    <form action="{{ route('index') }}" method="GET" class="form-inline">
    </form>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Voiture</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Rechercher par marque et/ou modèle souhaité" aria-label="Search">
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="#">Sign out</a>
            </div>
        </div>
    </div>
</div>
@endsection
