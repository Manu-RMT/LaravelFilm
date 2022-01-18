<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Film;
use Illuminate\Http\Request;
use App\Models\Film as FilmModel;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Film as FilmRequest;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug = null)
    {
        // voir autre methode dans le depot git
        $query = $slug ? Category::whereSlug($slug)->firstOrFail()->films() : Film::query();
        $liste_film = $query->withTrashed()->oldest('titre')->paginate(5);
        return view('Accueil', compact('liste_film', 'slug'));
    }

    /**
     * (index et create ) Dans les deux cas on va chercher toutes les catégories pour les envoyer à la vue.
     * Laravel propose le concept de composeur de vue (view composer) pour traiter cette situation de façon plus élégante.
     * Dans un premier temps on nettoie le contrôleur
     * ON PEUT LE METTRE DONC DANS App\Providers\AppServiceProvider
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all(); // recup toutes les categories
        return view('CreationFilm'); // on l'affiche dans la views
    }

    /**
     * Store a newly created resource in storage.
     * Ici on utilise le Film , là ou il y a les rules
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(FilmRequest $request)
    {
        FilmModel::create($request->all());
        return redirect()->route('films.index')->with('info', 'Le film a été créé');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(FilmModel $film)
    {
        return view('ShowFilm', compact('film'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(FilmModel $film)
    {
        $film->delete();
        return back()->with('info', 'Le film a été mis dans le corbeille. ');
    }

    public function forceDestroy($id)
    {
        FilmModel::withTrashed()->whereId($id)->firstOrFail()->forceDelete();

        return back()->with('info', 'Le film a bien été supprimé définitivement dans la base de données.');
    }

    public function restore($id)
    {
        FilmModel::withTrashed()->whereId($id)->firstOrFail()->restore();

        return back()->with('info', 'Le film a bien été restauré.');
    }
}

