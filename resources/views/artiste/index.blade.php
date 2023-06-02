@extends('layouts/app')
@section('css')
    <style>
        .card-footer {
            justify-content: center;
            align-items: center;
            padding: 0.4em;
        }
        select, .is-info {
            margin: 0.3em;
        }
    </style>

@endsection
@section('content')
@if(session()->has('info'))
<div class="notification is-success">
    {{ session('info') }}
</div>
@endif

<div class="card" style="width:100%">
    <header class="card-header">
        <p class="card-header-title">Mes Artistes</p>

        <a class="button is-info" href="{{ route('artiste.create') }}">Créer un artiste</a>
    </header>
    <div class="card-content">


            <table class="table is-hoverable" >
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom de l'artiste</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($artistes as $artiste)
                    <tr>
                        <td>{{ $artiste->id }}</td>
                        <td><strong>{{ $artiste->nom }}</strong></td>
                        <td><a class="button is-primary" href="{{ route('artiste.voir', $artiste->id) }}">Voir</a></td>
                        <td><a class="button is-warning" href="{{ route('artiste.edit', $artiste->id) }}">Modifier</a></td>
                        <td>
                            <a href="{{ route('artiste.destroy', $artiste->id) }}" action="{{ route('artiste.destroy', $artiste->id) }}">
                                <button class="button is-danger" type="submit">Supprimer</button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        <br><a class="button is-info" href="{{ route('playlist.index') }}">Accueil</a>


    </div>
    <footer class="card-footer">

    </footer>
</div>
@endsection
