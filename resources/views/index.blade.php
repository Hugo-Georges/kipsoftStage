
@extends('layout2')

@section('content2')
    <style>
        .uper
        {
            margin-top: 30px;
        }
  </style>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 uper">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
              <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
              <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
              <span data-feather="calendar"></span>
              This week
            </button>
          </div>
        </div>
        <canvas class="my-4 w-100 chartjs-render-monitor" id="myChart" style="display: block; width: 1125px; height: 475px;" width="1125" height="475"></canvas>

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
        <ul class="pagination justify-content-center mb-4">
            {{$cars->links("pagination::bootstrap-4")}}
        </ul>
        <a href="{{ route('cars.create')}}" class="btn btn-outline-success">Ajouter</a>
        <div class="d-md-flex justify-content-md-end">
            <a href="{{ route('index') }}" class="btn btn-outline-primary pull-right" role="button">Retour</a>
        </div>
      </main>
    </div>
</div>
@endsection
