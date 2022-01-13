<?php

namespace Database\Factories;
use App\Models\Category;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {
        $name = $this->faker->word();
        return [
            'name' => $name,
            'slug' => Str::slug($this->faker->name),
        ];
    }
}
