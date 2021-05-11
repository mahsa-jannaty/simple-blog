<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::latest()->paginate(2);
        return view('comments.index', compact('comments'));
    }
    public function store(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'name'  => 'required',
            'email' =>  'required',
            'text'  =>  'required|min:2|max:1000'
        ]);

        $comment = new Comment();
        $comment->name = $validatedData['name'];
        $comment->email = $validatedData['email'];
        $comment->text = $validatedData['text'];
        $comment->post_id = $post->id;
        
        $comment->save();

        flash('نظر شما با موفقیت ثبت شد.', 'success');
        return redirect('/posts/'.$post->id);
        // return redirect()->back();
    }

}
