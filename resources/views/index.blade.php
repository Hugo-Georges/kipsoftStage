@extends('layout')

@section('content')
<style>

    .uper
    {
        margin-top: 40px;
        background-color: #77767b;
    }
</style>
<div class="container">

    <h1>Rechercher par marque et/ou modèle souhaité</h1>

    <form action="{{ route('index') }}" method="GET">
        <input class="typeahead form-control" type="text" name="search" required/>
        <button type="submit" name="search2">Search</button>
    </form>


</div>



<div class="uper">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif

    @if(isset($search2))
        <p> Voici les résultats de votre recherche : <b> {{ $query }} </b> est :</p>
        <table class="table table-striped">
            <thead>
                <tr>
                  <td>ID</td>
                  <td>Marque</td>
                  <td>Modele</td>
                  <td>Prix</td>
                  <td colspan="2">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach($voitures as $voiture)
                <tr>
                    <td>{{$voiture->id}}</td>
                    <td>{{$voiture->marque}}</td>
                    <td>{{$voiture->modele }}
                    <td>{{$voiture->prix}}</td>
                    <td><a href="{{ route('cars.edit', $voiture->id)}}" class="btn btn-primary">Modifier</a></td>
                    <td>
                        <form action="{{ route('cars.destroy', $voiture->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    @else
    <table class="table table-striped">
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
            <td><a href="{{ route('cars.edit', $voiture->id)}}" class="btn btn-primary">Modifier</a></td>
            <td>
                <form action="{{ route('cars.destroy', $voiture->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </td>
            <td></td>
        </tr>
        @endforeach
    </tbody>
  </table>
  @endif
</div>
<a href="{{ route('cars.create')}}" class="btn btn-secondary">Ajouter</a>

@endsection

