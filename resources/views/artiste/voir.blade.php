@extends('template')
    @section('contenu')
        <div class="card">


            @foreach($artistes as $artiste)


            <header class="card-header">
                <p class="card-header-title"><strong>Nom de l'artiste</strong>  : {{ $artiste->nom }}</p>
            </header>
            <div class="card-content">
                <div class="content">

                    <p>Informations sur l'artiste :</p>
                    <ul>
                    <li>Nom de l'artiste : {{ $artiste->nom }}</li>
                    <li>Description de l'artiste: {{ $artiste->art_desc }}</li>
                    </ul>
                </div>
            </div>

            @endforeach

            <footer class="card-footer is-centered">
            <a class="button is-info" href="{{ route('artiste.showAll') }}">Retour à la liste</a>
        </footer>
        </div>
    @endsection
