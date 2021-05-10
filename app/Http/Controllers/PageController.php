<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PageController extends Controller
{
    public function index()
    {
        $post = Post::latest()->first();
        return view('pages.index', compact('post'));
    }
    public function about()
    {
        return view('pages.about');
    }
}
