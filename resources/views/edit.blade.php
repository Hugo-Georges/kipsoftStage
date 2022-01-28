@extends('layout')

@section('content')

<style>
  .uper {
    margin-top: 40px;
  }
</style>

<div class="card uper">
  <div class="card-header">
    Modifier la voiture
  </div>

  <div class="card-body">

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif

      <form method="post" action="{{ route('cars.update', $car->id ) }}">
            <div class="form-group">
                @csrf
                @method('PATCH')
                <label for="marque">Marque :</label>
                <input type="text" class="form-control" name="marque" value="{{ $car->marque }}"/>
            </div>
            <div class="form-group">
                <label for="modele">Modèle</label>
                <input type="text" class="form-control" name="modele" value="{{ $car->modele }}"/>
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
                <label for="motor">Motorisation de la voiture :</label>
                <select class="form-select" id="motor_type" name="motor_type">
                    @foreach ($motors as $motor)
                        <option value="{{ $motor->type }}">{{ $motor->type }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="description">Description de la voiture :</label>
                <textarea class="form-control" rows="4" name="description">{{ $car->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="cases">Prix :</label>
                <input type="text" class="form-control" name="prix" value="{{ $car->prix }}"/>
            </div>

            <div class="form-group">
                <label for="prix">Kilométrage de la voiture :</label>
                <input type="number" class="form-control" name="km" min="0" value="{{ $car->km }}"/>
            </div>

            <br>
            <button type="submit" class="btn btn-outline-secondary">Modifier</button>
            <div class="d-md-flex justify-content-md-end">
                <a href="{{ route('index') }}" class="btn btn-outline-primary pull-right" role="button">Retour</a>
            </div>
      </form>
  </div>
</div>
@endsection
