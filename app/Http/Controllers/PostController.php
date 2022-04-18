<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        return view('posts', [
            'posts' => Post::with(['user', 'category'])->latest()->paginate(7)
        ]);
    }

    public function search() {
        return view('posts', [
            'posts' => Post::filter()->where()->orWhere()->latest()->paginate(7)
        ]);
    }

    public function show($slug) 
    {
        return view('post', [
            'post' => Post::where($slug)->latest()->paginate(7)
        ]);
    }
}
