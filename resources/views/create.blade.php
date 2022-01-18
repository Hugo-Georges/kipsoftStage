@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>

<div class="card uper">
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
      </div><br />
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
                <input type="text" class="form-control" name="description"/>
            </div>

            <div class="form-group">
                <label for="prix">Prix de la voiture :</label>
                <input type="text" class="form-control" name="prix"/>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
  </div>
</div>
@endsection
