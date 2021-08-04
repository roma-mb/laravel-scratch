<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function show(Post $post, string $slug): string
    {
        return Str::slug($post->title) === $slug
            ? view('home', compact('post'))
            : redirect('/about');
    }
}
