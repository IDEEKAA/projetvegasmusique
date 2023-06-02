@extends('template')
@section('contenu')
<div class="card">
    <header class="card-header">
        <p class="card-header-title">Création d'un artiste</p>
    </header>
    <div class="card-content">
        <div class="content">
            <form action="{{ route('artiste.store') }}" method="POST">
                @csrf

                <div class="field">
                    <label class="label">Nom de l artiste</label>
                    <div class="control">
                        <input type="text" size="100" name="nom" placeholder="Nom de l artiste" value="{{ old('nom') }}">
                    </div>
                    @error('nom')
                    <p class="help is-danger">{{$message}}</p>
                    @enderror
                </div>


                <div class="field">
                    <label class="label">Description de l artiste</label>
                    <div class="control">
                        <input type="text" size="100" name="art_desc" placeholder="Description de l artiste" value="{{ old('art_desc') }}">
                    </div>
                    @error('nom')
                    <p class="help is-danger">{{$message}}</p>
                    @enderror
                </div>


                <div class="field">
                    <div class="control">
                        <button class="button is-link">Envoyer</button>

                        <a class="button is-info" href="{{ route('artiste.showAll') }}">Retour à la liste</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
