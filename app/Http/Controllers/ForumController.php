<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ForumController extends Controller
{

    public function index()
    {
        $posts = Post::query()->with('user')->paginate();

        return view('forum.index', [
            'posts' => $posts,
        ]);
    }

    public function create()
    {
        return view('forum.create');
    }

    public function show($slug)
    {
        $post = Post::query()->where('slug', $slug)->with('user')->firstOrFail();
        $relate_posts = Post::query()->inRandomOrder()->limit(3)->get();

        return view('forum.show', [
            'post' => $post,
            'relate_posts' => $relate_posts,
        ]);
    }

}
