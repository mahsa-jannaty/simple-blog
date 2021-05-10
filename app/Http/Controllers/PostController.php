<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        // $posts = Post::where('title', 'like', '%دوم%')->get();
        // $posts = Post::where('id', '>', '0')->latest()->get();
        // $posts = Post::where('title', 'عنوان پست دوم')->take(1)->get();
        // $posts = Post::where('id', 2)->orWhere('title', 'عنوان پست اول')->get();
        // $posts = Post::where('id', 2)->where('title', 'عنوان پست دوم')->get();
        // $posts = Post::where('title', 'عنوان پست دوم')->get();
        // $posts = Post::where('id', '1')->get();
        // $posts = Post::find(1);
        $posts = Post::latest()->get();

        return view('posts.index', compact('posts'));
    }
    // public function show($id)
    public function show(Post $post)
    {
        // $post = Post::findOrFail($id);

        return view('posts.show', compact('post'));
    }
}
