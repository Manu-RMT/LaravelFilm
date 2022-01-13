@extends('_layout')
@section('css')
    <style>
        div.hidden > div:nth-of-type(2) {
            display: none;
        }

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
            <button class="delete"></button>
            {{ session('info') }}
        </div>
    @endif
    <div class="card">

        <div class="card">
            <header class="card-header">
                <p class="card-header-title">Films</p>
                <div class="select">
                    <select onchange="window.location.href = this.value">
                        <option value="{{ route('films.index') }}" @unless($slug) selected @endunless>Toutes
                            catégories
                        </option>
                        @foreach($categories as $category)
                            <option
                                value="{{ route('films.category', $category->slug) }}" {{ $slug == $category->slug ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <a class="button is-info" href="{{ route('films.create') }}">Créer un film</a>
            </header>
            <div class="card-content">
                <div class="content">
                    <table class="table is-hoverable">
                        <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Annee</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--                        @foreach($liste_film as $film)--}}
                        {{--                            <tr>--}}
                        {{--                                <td><strong>{{ $film->titre }}</strong></td>--}}
                        {{--                                <td><strong>{{ $film->annee }}</strong></td>--}}
                        {{--                                <td><a class="button is-primary" href="{{ route('films.show', $film->id) }}">Voir</a>--}}
                        {{--                                </td>--}}
                        {{--                                <td><a class="button is-warning"--}}
                        {{--                                       href="{{ route('films.edit', $film->id) }}">Modifier</a>--}}
                        {{--                                </td>--}}
                        {{--                                <td>--}}
                        {{--                                    <form action="{{ route('films.destroy', $film->id) }}" method="post">--}}
                        {{--                                        @csrf--}}
                        {{--                                        @method('DELETE')--}}
                        {{--                                        <button class="button is-danger" type="submit"--}}
                        {{--                                                onclick="confirm('Etes vous sur de supprimer ce film ?')">Supprimer--}}
                        {{--                                        </button>--}}
                        {{--                                    </form>--}}
                        {{--                                </td>--}}
                        {{--                            </tr>--}}
                        {{--                        @endforeach--}}
                        @foreach($liste_film as $film)
                            <tr @if($film->deleted_at) class="has-background-grey-lighter" @endif>
                                <td><strong>{{ $film->titre }}</strong></td>
                                <td><strong>{{ $film->annee }}</strong></td>
                                <td>
                                    @if($film->deleted_at)
                                        <form action="{{ route('films.restore', $film->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <button class="button is-primary" type="submit">Restaurer</button>
                                        </form>
                                    @else
                                        <a class="button is-primary"
                                           href="{{ route('films.show', $film->id) }}">Voir</a>
                                    @endif
                                </td>
                                <td>
                                    @if($film->deleted_at)
                                    @else
                                        <a class="button is-warning" href="{{ route('films.edit', $film->id) }}">Modifier</a>
                                    @endif
                                </td>
                                <td>
                                    <form
                                        action="{{ route($film->deleted_at? 'films.force.destroy' : 'films.destroy', $film->id) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="button is-danger" type="submit">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <footer class="card-footer">
            {{ $liste_film->links() }}
        </footer>
        @endsection
        @section('JS')
            <script type="text/javascript">
                document.addEventListener('DOMContentLoaded', () => {
                    (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
                        const $notification = $delete.parentNode;

                        $delete.addEventListener('click', () => {
                            $notification.parentNode.removeChild($notification);
                        });
                    });
                });
            </script>

@endsection
