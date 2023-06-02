@extends('template')
@section('contenu')
<div class="card">
    <header class="card-header">
        <p class="card-header-title">Modification de l artiste</p>
    </header>
    <div class="card-content">
        <div class="content">
            <form class="form-horizontal" method="POST" action="{{ route('artiste.update', $artiste[0]->id) }}">
                {{ csrf_field() }}

                {{ method_field('POST') }}


                <div class="field">
                    <label for="nom" class="label">Nom de l artiste</label>

                    <div class="control">
                        <input id="nom" name="nom" placeholder="Nom  de l artiste" value="{{ old('nom',$artiste[0]->nom) }}">
                    </div>
                    @error('nom')
                    <p class="help is-danger">Le nom de l artiste est incorrect</p>
                    @enderror

                </div>


                
                <div class="field">
                    <label for="art_desc" class="label">Description de l'artiste</label>

                    <div class="control">
                        <input  id="art_desc" name="art_desc" placeholder="Description  de l artiste" value="{{ old('art_desc',$artiste[0]->art_desc) }}">
                    </div>
                    @error('art_desc')
                    <p class="help is-danger">La description de l artiste est incorrect</p>
                    @enderror

                </div>

                <div class="field">
                    <div class="control">
                        <button type="submit" class="button is-link">
                            Enregistrer
                        </button>
                        <a class="button is-info" href="{{ route('artiste.showAll') }}">Retour à la liste</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection