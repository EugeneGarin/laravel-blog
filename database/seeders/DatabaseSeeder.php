<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::factory()->create([
            'name' => 'John Doe',
        ]);

        $user2 = User::factory()->create([
            'name' => 'Eugene Garin',
        ]);

        $category1 = Category::factory()->create([
            'name' => 'Hobbies',
        ]);

        $category2 = Category::factory()->create([
            'name' => 'Work',
        ]);

        Post::factory()->create([
            'user_id'       => $user1->id,
            'category_id'   => $category1->id,
        ]);

        Post::factory()->create();

        Post::factory(2)->create([
            'user_id'       => $user2->id,
            'category_id'   => $category2->id,
        ]);

        Post::factory(2)->create();
    }
}
