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
                <p>Catégories :</p>
                <ul>
                    @foreach($film->category as $category)
                        <li>{{ $category->name }}</li>
                    @endforeach
                </ul>
                <hr>
                <p>Acteurs :</p>
                <ul>
                    @foreach($film->actors as $actor)
                        <li>{{ $actor->name }}</li>
                    @endforeach
                </ul>
                <hr>
                <legend>Avis :</legend>
                <p><strong>{{ $film->description }}</strong></p>
            </div>
        </div>
    </div>
@endsection
