<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;


class CommentController extends Controller
{
    public  function submit(Request $request, Post $post) {
        $request->validate([
            'name' => 'required|string',
            'body' => 'required|string',
        ]);

        $post->comments()->create([
            'name' => $request->input('name'),
            'body' => $request->input('body'),
        ]);
        
        return redirect()->route('post', $post);
    }

    public function delete(Comment $comment)
    {

        $post = $comment->post;
        $comment->delete();

        return redirect()->route('post', $post->slug);
    }

       
}
