@extends('_layout')

@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Modification d'un film</p>
        </header>
        <div class="card-content">
            <div class="content">
                <form action="{{ route('films.update', $film->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="field">
                        <label class="label">Catégories</label>
                        <div class="select is-multiple">
                            <select name="cats_selected[]" multiple>
                                @foreach($categories as $category)
                                    <option
                                        value="{{ $category->id }}"
                                        {{ in_array($category->id, old('cats_selected') ?: $film->category->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label class="label">Titre</label>
                        <div class="control">
                            <input class="input @error('titre') is-danger @enderror" type="text" name="titre"
                                   value="{{ old('titre', $film->titre) }}" placeholder="Titre du film">
                        </div>
                        @error('title')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="label">Année de diffusion</label>
                        <div class="control">
                            <input class="input" type="number" name="annee" value="{{ old('year', $film->annee) }}"
                                   min="1950" max="{{ date('Y') }}">
                        </div>
                        @error('year')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="label">Description</label>
                        <div class="control">
                            <textarea class="textarea" name="description"
                                      placeholder="Description du film">{{ old('description', $film->description) }}</textarea>
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
