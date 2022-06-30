<?php

namespace Database\Factories;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            'user_id'=> 1,
        'title' => $this-> faker->sentence,
        'body' => $this-> faker->text(800),
        ];
    }
}
