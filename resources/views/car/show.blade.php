@extends('layouts.car')

@section('content')
<style>
    .uper {
      margin-top: 40px;
    }
  </style>
<div class="container">
<div class="card uper bg-light text-dark">
    <div class="card-header">
        Informations sur la voiture
    </div>
    <div class="card-body">
        <img class="bd-placeholder-img card-img-top" width="20%" height="50%" src="https://loremflickr.com/320/240/car">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Vendeur : {{ $car->user['name'] }}</li>
            <li class="list-group-item">Marque : {{ $car->marque }}</li>
            <li class="list-group-item">Modele : {{ $car->modele }}</li>
            <li class="list-group-item">Anée de fabrication : {{ $car->annee }}</li>
            <li class="list-group-item">Kilométrage : {{ $car->km }}</li>
            <li class="list-group-item">Description : {{ $car->description }}</li>
            <li class="list-group-item">Prix : {{ $car->prix }} €</li>
        </ul>
        <br>
        <h5 class="card-title">Commentaires : </h5>
        @if (!$comments->isNotEmpty())
            <p class="text-center">Soyez la première personne à mettre un commentaire pour cette voiture</p>
        @else
        @foreach ($comments as $comment)
            <p>{{ $comment->contenu }}</p>
            <form action="{{ route('cars.comments.destroy', [$car->id, $comment->id])}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger" type="submit">Supprimer</button>
              </form>
        @endforeach
        @endif
        <br>
    </div>
</div>
<br>
<div class="d-md-flex justify-content">
    <a href="{{ route('cars.comments.create', $car->id)}}" class="btn btn-outline-success">Ajouter</a>
</div>
<div class="d-md-flex justify-content-md-end">
    <a href="{{ route('preview') }}" class="btn btn-outline-primary" role="button">Retour</a>
</div>
</div>
@endsection
