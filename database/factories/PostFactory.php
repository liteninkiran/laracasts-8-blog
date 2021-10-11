<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

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
        $category = Category::inRandomOrder()->first();

        return [
            'slug' => $this->faker->safeColorName() . '-' . $this->faker->randomNumber($nbDigits = 3, $strict = true),
            'title' => $this->faker->realText($maxNbChars = 15, $indexSize = 5),
            'excerpt' => '<p>' . $this->faker->realText($maxNbChars = 200, $indexSize = 3) . '</p>',
            'body' => '<p>' . $this->faker->realText($maxNbChars = 1000, $indexSize = 5) . '</p>',
            'published_at' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'user_id' => $user->id,
            'category_id' => $category->id,
            ];
    }
}
