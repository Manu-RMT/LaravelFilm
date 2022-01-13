@extends('_layout')

@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Création d'un film</p>
        </header>
        <div class="card-content">
            <div class="content">
                <form action="{{ route('films.store') }}" method="POST">
                    @csrf
                    <div class="field">
                        <label class="label">Titre</label>
                        <div class="control">
                            <input class="input @error('titre') is-danger @enderror" type="text" name="titre" value="{{ old('titre') }}" placeholder="Titre du film">
                        </div>
                        @error('titre')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="label">Année de diffusion</label>
                        <div class="control">
                            <input class="input" type="number" name="annee" value="{{ old('annee') }}" min="1950" max="{{ date('Y') }}">
                        </div>
                        @error('annee')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="label">Description</label>
                        <div class="control">
                            <textarea class="textarea" name="description" placeholder="Description du film">{{ old('description') }}</textarea>
                        </div>
                        @error('description')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <div class="control">
                            <button class="button is-link">Envoyer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
