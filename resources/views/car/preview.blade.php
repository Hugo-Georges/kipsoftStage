@extends('layouts.searchCar', ['motors' => $motors])

@section('content')
    <main>
        <section class="py-5 text-center container">
          <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
              <h1 class="fw-light">Bienvenue</h1>
              <p class="lead text-muted">Ici vous pouvez vendre vos voitures ou en acheter de nouvelles</p>
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
                                    <li class="list-group-item">Vendeur : {{ $car->user['name'] }}</li>
                                    <li class="list-group-item">Marque : {{ $car->marque }}</li>
                                    <li class="list-group-item">Modele : {{ $car->modele }}</li>
                                    <li class="list-group-item">Motorisation : {{ $car->motorisation['type']}}</li>
                                    <li class="list-group-item">Année de fabrication : {{ $car->annee }}</li>
                                    <li class="list-group-item">Kilométrage au compteur : {{ $car->km }} km</li>
                                    <li class="list-group-item">Description : {{ $car->description }}</li>
                                    <li class="list-group-item">Prix : {{ $car->prix }} €</li>
                                </ul>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ route('cars.show', $car->id)}}" class="btn btn-outline-info">Détail</a>
                                        <a href="{{ route('favorites', $car->id) }}" class="btn btn-outline-secondary float-right" >fav</a>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                            </svg>
                                        </a>
                                    </div>
                                    <small class="text-muted">9 mins</small>
                                  </div>
                                <!--Pour voir plus d'informations sur une voiture-->


                            </div>
                        </div>

                    </div>
                    @endforeach
                </div>
            </div>
            <br>
            <div class="d-md-flex justify-content">
            <a href="{{ route('cars.create')}}" class="btn btn-outline-success">Ajouter</a>
            </div>
            <div class="d-md-flex justify-content-md-end">
                <a href="{{ route('preview') }}" class="btn btn-outline-primary pull-right" role="button">Retour</a>
            </div>
            <ul class="pagination justify-content-center mb-4">
                {{$cars->links("pagination::bootstrap-4")}}
            </ul>
        </div>
    </main>
@endsection
