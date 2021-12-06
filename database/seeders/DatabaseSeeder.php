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
        User::truncate();
        Post::truncate();
        Category::truncate();

        $user = User::factory()->create();

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);

        $family = Category::create([
            'name' => 'Family',
            'slug' => 'family',
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work',
        ]);

        Post::create([
            'user_id'       => $user->id,
            'category_id'   => $personal->id,
            'slug'          => 'my-first-post',
            'title'         => 'My First Post',
            'excerpt'       => '<p>Lorem ipsum dolor sit amet.</p>',
            'body'          => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae laudantium dolor officia velit tempora iste iure debitis commodi, consequuntur dolorum veritatis. Possimus recusandae perspiciatis illum, suscipit voluptas officia magni temporibus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae laudantium dolor officia velit tempora iste iure debitis commodi, consequuntur dolorum veritatis. Possimus recusandae perspiciatis illum, suscipit voluptas officia magni temporibus.</p>',
        ]);

        Post::create([
            'user_id'       => $user->id,
            'category_id'   => $family->id,
            'slug'          => 'my-second-post',
            'title'         => 'My Second Post',
            'excerpt'       => '<p>Lorem ipsum dolor sit amet.</p>',
            'body'          => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae laudantium dolor officia velit tempora iste iure debitis commodi, consequuntur dolorum veritatis. Possimus recusandae perspiciatis illum, suscipit voluptas officia magni temporibus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae laudantium dolor officia velit tempora iste iure debitis commodi, consequuntur dolorum veritatis. Possimus recusandae perspiciatis illum, suscipit voluptas officia magni temporibus.</p>',
        ]);

        Post::create([
            'user_id'       => $user->id,
            'category_id'   => $work->id,
            'slug'          => 'my-third-post',
            'title'         => 'My hird Post',
            'excerpt'       => '<p>Lorem ipsum dolor sit amet.</p>',
            'body'          => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae laudantium dolor officia velit tempora iste iure debitis commodi, consequuntur dolorum veritatis. Possimus recusandae perspiciatis illum, suscipit voluptas officia magni temporibus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae laudantium dolor officia velit tempora iste iure debitis commodi, consequuntur dolorum veritatis. Possimus recusandae perspiciatis illum, suscipit voluptas officia magni temporibus.</p>',
        ]);
    }
}
