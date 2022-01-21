@extends('layout')

@section('content')

<main>

    <section class="py-5 text-center container">
      <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="fw-light">Bienvenue</h1>
          <p class="lead text-muted">Ici vous pouvez vendre ou acheter vos voitures</p>
        </div>
      </div>
    </section>

    <div class="album py-5 bg-light">
      <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class="col">
                @foreach ($cars as $car)
                    <div class="card shadow-sm">
                        <img src="https://loremflickr.com/320/240/car">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Marque : {{ $car->marque }}</li>
                                <li class="list-group-item">Modele : {{ $car->modele }}</li>
                                <li class="list-group-item">Anée de fabrication : {{ $car->annee }}</li>
                                <li class="list-group-item">Kilométrage au compteur : {{ $car->km }} km</li>
                                <li class="list-group-item">Description : {{ $car->description }}</li>
                                <li class="list-group-item">Prix : {{ $car->prix }} €</li>
                            </ul>
                            <a href="{{ route('cars.show', $car->id)}}" class="btn btn-outline-info">Détail</a>
                            <a href="{{ route('cars.edit', $car->id)}}" class="btn btn-outline-secondary">Modifier</a>
                        </div>
                    </div>
                @endforeach
            </div>
          <!--<div class="col">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

              <div class="card-body">
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                  </div>
                  <small class="text-muted">9 mins</small>
                </div>
              </div>
            </div>
          </div>-->
        </div>
        <ul class="pagination justify-content-center mb-4">
            {{$cars->links("pagination::bootstrap-4")}}
        </ul>
      </div>
    </div>

  </main>

@endsection
