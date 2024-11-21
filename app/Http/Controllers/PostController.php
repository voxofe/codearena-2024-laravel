<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

class PostController extends Controller
{
    public function index(User $user = null)
    {
        
        $posts = Post::when($user, function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->whereNotNull('image')
        ->whereNotNull('published_at')
        ->orderBy('promoted','desc')
        ->orderBy('published_at', 'desc')->paginate(12);


        $authors = User::whereHas('posts', function ($query) {
            $query->whereNotNull('published_at');
        })->get();

        return view('posts.index',compact('posts', 'authors'));
    }

    public function show(Post $post)
    {

        $comments = Comment::where('post_id', $post->id)->orderBy('created_at', 'desc')->get();
        if ($post->published_at){
            return view('posts.show', compact('post', 'comments'));
        }else{
            abort(404);
        }
        
    }

    public function promoted(){
        $promotedPosts = Post::where('promoted',true )->paginate(12);
        
        return view('posts.promoted', compact('promotedPosts'));
    }


}
