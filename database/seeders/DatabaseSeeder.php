<?php

namespace Database\Seeders;

use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create()
        ->each(function (User $user) {
            $user->posts()->saveMany(Post::factory(rand(5, 10))->make())
            ->each( function (Post $post){
                $post->comments()->saveMany(Comment::factory(rand(0,5))->make());
            });
        });
    }
}
