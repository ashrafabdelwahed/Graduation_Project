<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function show($slug) {

        $post = Post::where('slug', $slug)->first();

        $posts_related = Post::where('category_id', $post->category_id)->whereNotIn('slug',[$slug])->limit(5)->get();

        return view('front.post.show', compact('post','posts_related'));

    }

}
