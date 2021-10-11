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

        $title = $this->faker->realText(50);
        $paragraphs = $this->faker->paragraphs(rand(2, 6));
        $body = "<i>{$title}</i>";
        foreach ($paragraphs as $para) {
            $body .= "<p>{$para}</p>";
        }

        return [
            'slug' => $this->faker->slug,
            'title' => $this->faker->sentence,
            'excerpt' => '<p>' . $this->faker->sentence . '</p>',
            'body' => $body,
            'published_at' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'user_id' => $user->id,
            'category_id' => $category->id,
            ];
    }
}
