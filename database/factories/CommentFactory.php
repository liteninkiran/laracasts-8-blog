<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::inRandomOrder()->first();
        $post = Post::inRandomOrder()->first();
        return [
            'post_id' => $post->id,
            'user_id' => $user->id,
            'body' => '<p>' . implode('</p><p>', $this->faker->paragraphs(1)) . '</p>',
        ];
    }
}
