<?php

namespace Database\Seeders;


use App\Models\Actor;
use App\Models\Category;
use App\Models\Film;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     *
     * @return void
     */
    public function run()
    {
        Actor::factory(10)->create();
        $categories = [
            'Comédie',
            'Drame',
            'Action',
            'Fantastique',
            'Horreur',
            'Animation',
            'Espionnage',
            'Guerre',
            'Policier',
        ];
        foreach ($categories as $category) {
            Category::create(['name' => $category, 'slug' => Str::slug($category)]);
        }
        $ids = range(1, 10);
        Film:: factory(40)->create()->each(function ($film) use ($ids) {
            shuffle($ids);
            $film->category()->attach(array_slice($ids, 0, rand(1, 4)));
            shuffle($ids);
            $film->actors()->attach(array_slice($ids, 0, rand(1, 4)));
        });


    }
}
