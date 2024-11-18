<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BlogTest extends TestCase
{
    use RefreshDatabase;

    public function testBlogPostsPageIsAccessible()
    {
        $this->get(route('posts'))
            ->assertOk();
    }

    public function testBlogPostsPageContainsPosts()
    {
        $user = User::factory()->create();

        $post = Post::factory()->create([
            'user_id' => $user->id,
        ]);

        $this->get(route('posts'))
            ->assertSee($post->title);
    }

    public function testBlogPostPageIsAccessible()
    {
        $user = User::factory()->create();

        $post = Post::factory()->create([
            'user_id' => $user->id,
        ]);

        $this->get(route('post', $post))
            ->assertOk();
    }
}
