<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }
    public function show(Post $post)
    {
        // $comments = Comment::where('post_id', $post->id)->latest()->get();
        $comments = $post->comments()->latest()->get();
        
        return view('posts.show', compact('post', 'comments'));
    }
    public function add()
    {
        return view('posts.add');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'         =>      'required|unique:posts',
            'description'   =>      'required|min:3|max:255'
        ]);

        $post = new Post();
        $post->title = $validatedData['title'];
        $post->description = $validatedData['description'];
        $post->save();

        flash('پست جدید با موفقیت ذخیره شد.', 'success');
        return redirect()->back();
        
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title'         =>      'required',
            'description'   =>      'required|min:3|max:255'
        ]);

        $post->title = $validatedData['title'];
        $post->description = $validatedData['description'];
        $post->save();

        flash('پست با موفقیت ذخیره شد.', 'success');
        return redirect()->back();
    }

    public function delete(Post $post)
    {  
        $post->delete();

        flash('پست با موفقیت حذف شد.', 'success');
        return redirect()->back();
    }
}
