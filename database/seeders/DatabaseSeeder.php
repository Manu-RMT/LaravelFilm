<?php

namespace Database\Seeders;


use App\Models\Category;
use App\Models\Film;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     *
     * @return void
     */
    public function run()
    {
       // Category::factory(10)->create(); // On commence par créer 10 catégories
        $ids = range(1, 10);
        //on crée 20 films et pour chacun on attache entre 1 et 4 catégories
        Film::factory(20)->create()->each(function ($film) use ($ids) {
            shuffle($ids);
            $film->category()->attach(array_slice($ids, 0, rand(1, 4))); // attach 1 à 4 categories avec films et Eloquent ce charge de remplr la table pivot
        });
    }
}
