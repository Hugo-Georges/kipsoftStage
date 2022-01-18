@extends('layout')

@section('content')
<div class="card listVoiture">
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
