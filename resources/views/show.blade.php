@extends('layout')

@section('content')
<style>
    .uper {
      margin-top: 40px;
    }
  </style>
<div class="card uper">
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

</div>
@foreach ($comments as $comment)
    <p>{{ $comment->contenu }}</p>
@endforeach
            <div class="d-md-flex justify-content-md-end">
            <a href="{{ route('index') }}" class="btn btn-outline-primary pull-right" role="button">Retour</a>
            </div>
