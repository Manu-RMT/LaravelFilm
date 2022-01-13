@extends('_layout')

@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Titre : {{ $film->titre }}</p>
        </header>
        <div class="card-content">
            <div class="content">
                <p>Année de sortie : <strong> {{ $film->annee }}</strong></p>
                <hr>
                <legend>Avis :</legend>
                <p><strong>{{ $film->description }}</strong></p>
            </div>
        </div>
    </div>
@endsection
