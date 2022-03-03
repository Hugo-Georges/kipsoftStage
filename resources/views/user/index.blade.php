
@extends('layouts.searchUser')

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
                    <td>Nom</td>
                    <td>Email</td>
                    <td colspan="3">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email }}
                    <td><a href="{{ route('users.show', $user->id)}}" class="btn btn-outline-info">Détail</a></td><!--Pour voir plus d'informations sur un utilisateur-->
                    <td><a href="{{ route('users.edit', $user->id)}}" class="btn btn-outline-secondary">Modifier</a></td><!--Pour modifier un utilisateur-->
                    <td>
                        <form action="{{ route('users.destroy', $user->id)}}" method="post"><!--Pour supprimer un utilisateur-->
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
    <div class="d-md-flex justify-content-md-end">
        <a href="{{ route('users.index') }}" class="btn btn-outline-primary pull-right" role="button">Retour</a>
    </div>
</div>
@endsection
