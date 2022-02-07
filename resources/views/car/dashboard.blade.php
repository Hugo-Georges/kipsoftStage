
@extends('layouts.searchCar', ['motors' => $motors])

@section('content')
    <style>
        .uper
        {
            margin-top: 30px;
        }
    </style>
    <br>
    <h2>Section title</h2>
    <div class="table-responsive text-center">
        <table class="table table-striped table-sm"><!--Tableau avec l'ensemble des voitures -->
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Marque</td>
                    <td>Modele</td>
                    <td>Prix</td>
                    <td>Année</td>
                    <td>Kilométrage</td>
                    <td>Motorisation</td>
                    <td colspan="3">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach($cars as $car)
                <tr>
                    <td>{{$car->id}}</td>
                    <td>{{$car->marque}}</td>
                    <td>{{$car->modele }}
                    <td>{{$car->prix}}</td>
                        <td>{{ $car->annee }}</td>
                    <td>{{ $car->km }}</td>
                    <td>{{ $car->motor_id }}
                    <td><a href="{{ route('cars.show', $car->id)}}" class="btn btn-outline-info">Détail</a></td><!--Pour voir plus d'informations sur une voiture-->
                    <td><a href="{{ route('cars.edit', $car->id)}}" class="btn btn-outline-secondary">Modifier</a></td><!--Pour modifier une voiture-->
                    <td>
                        <form action="{{ route('cars.destroy', $car->id)}}" method="post"><!--Pour supprimer une voiture-->
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger" type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route('cars.create')}}" class="btn btn-outline-success">Ajouter</a>
    <div class="d-md-flex justify-content-md-end">
        <a href="{{ route('dashboard') }}" class="btn btn-outline-primary pull-right" role="button">Retour</a>
    </div>
    <ul class="pagination justify-content-center mb-4">
        {{$cars->links("pagination::bootstrap-4")}}
    </ul>
</div>
@endsection
