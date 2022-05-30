@extends('layouts.car')

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
                <label for="annee">Année de fabrication de la voiture  :</label>
                <select class="form-control" name="annee">
                    <option>{{ $startYear }}</option>
                    @while ($startYear != $finalYear)
                        <option>{{ $startYear += 1 }}</option>
                    @endwhile <!--boucle pour afficher toutes les années dans le select -->
                </select>
            </div>

            <div class="form-group">
                <label for="motor_id">Motorisation de la voiture :</label>
                <select class="form-control" id="motor_id" name="motor_id">
                    @foreach ($motors as $motor)
                        <option value="{{ $motor->id }}">{{ $motor->type }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="description">Description de la voiture :</label>
                <textarea class="form-control" rows="4" name="description"></textarea>
            </div>

            <div class="form-group">
                <label for="prix">Prix de la voiture :</label>
                <input type="number" class="form-control" name="prix" min ="0"/>
            </div>

            <div class="form-group">
                <label for="km">Kilométrage de la voiture :</label>
                <input type="number" class="form-control" name="km" min="0"/>
            </div>

            <div class="form-group">
                <input type="hidden" class="form-control" name="user_id" id="user_id" value={{ $user }}/>
            </div>

            <br>

            <button type="submit" class="btn btn-outline-success">Ajouter</button>

            <div class="d-md-flex justify-content-md-end">
                <a href="{{ route('preview') }}" class="btn btn-outline-primary pull-right" role="button">Retour</a>
            </div>
        </form>
    </div>
</div>
</div>
@endsection
