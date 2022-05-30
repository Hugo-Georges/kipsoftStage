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
