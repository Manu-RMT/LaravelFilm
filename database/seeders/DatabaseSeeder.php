<?php

namespace Database\Seeders;


use App\Models\Category;
use App\Models\Film;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * On appelle la fabrique (factory) pour le modèle des utilisateurs (App\User::class),
     * on en veut 5, on les crée (create) pour chacun des utilisateurs créés (each $user)
     * on utilise la relation (posts()) pour créer plusieurs (saveMany) articles (App\Post::class) en utilisant la fabrique (factory),
     * on en veut entre 2 et 5 (rand(2, 5)).
     *
     * VERSION INTERIEUR LARAVEL 8
     *factory(App\User::class, 5)->create()->each(function ($user) {
     * $user->posts()->saveMany(factory(App\Post::class, rand(2, 5))->make());
     * });
     *
     * @return void
     */
    public function run()
    {
        // on apelle le Model Categorie pour créer les categories : on en veut 10 et on les crée
        // pour chaque category on utilise la table films (films()) et et crerr plusieuers (saveMany) films (Films::factory) : on en veut entre 2 et 5 pour chaque category
        Category::factory(10)->create()->each(function ($category) {
            $category->films()->saveMany(Film::factory(rand(2, 5))->make());
        });
    }
}
