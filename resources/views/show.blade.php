@extends('layout')

@section('content')
<style>
    .uper {
      margin-top: 40px;
    }
  </style>
<div class="card uper bg-light text-dark" style="width: 80rem;">
    <div class="card-header">
        Informations sur la voiture
    </div>
    <div class="card-body">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Marque : {{ $car->marque }}</li>
            <li class="list-group-item">Modele : {{ $car->modele }}</li>
            <li class="list-group-item">Prix : {{ $car->prix }} €</li>
            <li class="list-group-item">Description : {{ $car->description }}</li>
        </ul>
        <br>
        <h5 class="card-title">Commentaires : </h5>
        @foreach ($comments as $comment)
            <p>{{ $comment->contenu }}</p>
            <form action="{{ route('cars.comments.destroy', [$car->id, $comment->id])}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger" type="submit">Supprimer</button>
              </form>
        @endforeach
        <br>

    </div>
</div>
<br>
<div class="d-md-flex justify-content">
    <a href="{{ route('cars.comments.create', $car->id)}}" class="btn btn-outline-success">Ajouter</a>
</div>
<div class="d-md-flex justify-content-md-end">
    <a href="{{ route('index') }}" class="btn btn-outline-primary pull-right" role="button">Retour</a>
</div>
@endsection
