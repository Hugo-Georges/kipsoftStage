@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="container">
<div class="card bg-light text-dark uper">
  <div class="card-header">
    Ajouter une Voiture
  </div>

  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br/>
    @endif

        <form method="post" action="{{ route('cars.store') }}">
            @csrf
            <div class="form-group">
                <label for="marque">Marque de Voiture :</label>
                <input type="text" class="form-control" name="marque"/>
            </div>

             <div class="form-group">
                <label for="marque">Modèle de Voiture :</label>
                <input type="text" class="form-control" name="modele"/>
            </div>

            <div class="form-group">
                <label for="description">Description de la voiture :</label>
                <!--<input type="text" class="form-control" name="description"/>-->
                <textarea class="form-control" rows="4" name="description"></textarea>
            </div>

            <div class="form-group">
                <label for="prix">Prix de la voiture :</label>
                <input type="number" class="form-control" name="prix" min ="0"/>
            </div>

            <div class="form-group">
                <label for="prix">Année de fabrication de la voiture  :</label>
                <input type="number" class="form-control" name="annee" min="1884" max="2022"/>
            </div>

            <div class="form-group">
                <label for="prix">Kilométrage de la voiture :</label>
                <input type="number" class="form-control" name="km" min="0"/>
            </div>

            <br>
            <button type="submit" class="btn btn-outline-success">Ajouter</button>
            <div class="d-md-flex justify-content-md-end">
                <a href="{{ route('index') }}" class="btn btn-outline-primary pull-right" role="button">Retour</a>
            </div>
        </form>
  </div>
</div>
</div>
@endsection
