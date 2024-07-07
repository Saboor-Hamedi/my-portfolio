<?php

namespace Database\Factories;

use App\Models\Posts;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Posts>
 */
class PostsFactory extends Factory
{
    protected $model = Posts::class;


    public function definition(): array
    {

        $title = $this->faker->sentence;
        return [
            'user_id' => $this->faker->numberBetween(1, 2),
            'title' => $title,
            "body" => $this->faker->paragraph(10),
            'slug' => Str::slug($title),
            'is_publish' => $this->faker->boolean()
        ];
    }
}
