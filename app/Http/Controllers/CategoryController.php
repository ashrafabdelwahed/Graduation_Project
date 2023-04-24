<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    public  function index() {

        $categories = Category::orderBy('id','desc')->paginate(8);

        return view('front.category.index', compact('categories'));
    }


    public function show($slug) {

        $category = Category::where('slug',$slug)->first();
        $posts = Post::where('category_id', $category->id)->paginate(8);

        return view('front.category.show', compact('posts','category'));

    }


}
