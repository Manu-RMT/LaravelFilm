<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * On utilise la façade View avec la méthode composer pour mettre en place le fait que
     * chaque fois qu’une des deux vues index ou create et appelée alors
     * on associe la variable categories qui contient toutes les catégories.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['Accueil', 'createFilm'], function ($view) {
            $view->with('categories', Category::all());
        });
    }
}
