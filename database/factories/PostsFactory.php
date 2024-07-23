<?php

namespace Database\Factories;

use App\Models\Posts;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class PostsFactory extends Factory
{
    protected $model = Posts::class;


    public function definition(): array
    {
        $title = $this->faker->sentence;
        return [
            'user_id' => $this->faker->numberBetween(1, 2),
            'title' => $title,
            'body' => $this->faker->paragraph(10),
            'slug' => Str::slug($title),
            'image' => 'postImages/' . basename($this->faker->image('public/storage/postImages', 400, 300)),
            'is_publish' => $this->faker->boolean(),
        ];
    }
}
