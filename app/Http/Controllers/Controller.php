<?php

namespace App\Http\Controllers;

use App\Models\Post;

abstract class Controller
{
//     public function index()
// {
//     $posts = Post::all();
//     return view('welcome', compact('posts'));
// }
public function index()
{
    $posts = Post::all();
    return view('welcome', compact('posts'));
}
}
