@extends('layout')

@section('content')
<style>
     .uper
    {
        margin-top: 40px;
        background-color: #000000;
    }
</style>
<br>
<div class="container-*">

    <form action="{{ route('index') }}" method="GET" class="form-inline">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Rechercher par marque et/ou modèle souhaité" name="search" required/>
            <button type="submit" name="search2" class="btn btn-outline-dark">Search</button>
        </div>
    </form>



</div>



<div class="uper">
    <table class="table table-dark table-hover">
    <thead>
        <tr>
          <td>ID</td>
          <td>Marque</td>
          <td>Modele</td>
          <td>Prix</td>
          <td colspan="3">Action</td>
        </tr>
    </thead>

    <tbody>
        @foreach($voitures as $voiture)
        <tr>
            <td>{{$voiture->id}}</td>
            <td>{{$voiture->marque}}</td>
            <td>{{$voiture->modele }}
            <td>{{$voiture->prix}}</td>
            <td><a href="{{ route('cars.edit', $voiture->id)}}" class="btn btn-outline-secondary">Modifier</a></td>
            <td><a href="{{ route('cars.show', $voiture->id)}}" class="btn btn-outline-info">Détail</a></td>
            <td>
                <form action="{{ route('cars.destroy', $voiture->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-outline-danger" type="submit">Supprimer</button>
                </form>
            </td>
            <td></td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
<a href="{{ route('cars.create')}}" class="btn btn-outline-success">Ajouter</a>
<div class="d-md-flex justify-content-md-end">
    <a href="{{ route('index') }}" class="btn btn-outline-primary pull-right" role="button">Retour</a>
</div>
@endsection

