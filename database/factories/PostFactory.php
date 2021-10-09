<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use App\Models\User;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::inRandomOrder()->first();
        return [
            'title' => $this->faker->word(),
            'excerpt' => '<p>' . $this->faker->realText($maxNbChars = 200, $indexSize = 3) . '</p>',
            'body' => '<p>' . $this->faker->realText($maxNbChars = 1000, $indexSize = 5) . '</p>',
            'published_at' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'user_id' => $user->id,
            ];
    }
}
