@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>

<div class="card bg-light text-dark uper">
    <div class="card-header">
      Ajouter un commentaire pour cette voiture
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

    <form method="post" action="{{ route('cars.comments.store', $car_id)}}">
        @csrf
        <div class="form-group">
            <label for="contenu">Votre commentaire:</label>
            <textarea class="form-control" rows="4" name="contenu"></textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-outline-success">Ajouter</button>
        <div class="d-md-flex justify-content-md-end">
            <a href="{{ route('cars.show', $car_id) }}" class="btn btn-outline-primary pull-right" role="button">Retour</a>
        </div>
  </div>
</div>
@endsection
