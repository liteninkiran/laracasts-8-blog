<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Category::factory(5)->create();

        // Work
        Category::create([
            'slug' => 'work',
            'name' => 'Work',
        ]);

        // Travel
        Category::create([
            'slug' => 'travel',
            'name' => 'Travel',
        ]);

        // Home
        Category::create([
            'slug' => 'home',
            'name' => 'Home',
        ]);

        // Food
        Category::create([
            'slug' => 'food',
            'name' => 'Food',
        ]);

        // Nature
        Category::create([
            'slug' => 'nature',
            'name' => 'Nature',
        ]);

        // Entertainment
        Category::create([
            'slug' => 'entertainment',
            'name' => 'Entertainment',
        ]);

        // Education
        Category::create([
            'slug' => 'education',
            'name' => 'Education',
        ]);
    }
}
