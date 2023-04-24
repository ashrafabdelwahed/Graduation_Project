<?php

namespace App\Http\Controllers;

use App\Msg;
use App\Post;
use App\Cancer;
use App\Experiment;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $experiments = Experiment::inRandomOrder()->where('status', 1)->limit(8)->get();
        $msgs = Msg::inRandomOrder()->limit(5)->get();
        return view('home', compact('experiments','msgs'));
    }


    public function search(Request $request) {

        $search = $request->search;

        $posts = Post::query()->where('title', 'LIKE', "%{$search}%")
        ->orWhere('content', 'LIKE', "%{$search}%")
        ->get();


        $experiments = Experiment::query()->where('status', 1)
        ->where('title', 'LIKE', "%{$search}%")
        ->orWhere('content', 'LIKE', "%{$search}%")
        ->get();


        $cancers = Cancer::query()->where('name', 'LIKE', "%{$search}%")
        ->orWhere('content', 'LIKE', "%{$search}%")
        ->orWhere('risk_factors', 'LIKE', "%{$search}%")
        ->orWhere('early_symptoms', 'LIKE', "%{$search}%")
        ->orWhere('protection', 'LIKE', "%{$search}%")
        ->orWhere('early_detection', 'LIKE', "%{$search}%")
        ->get();


        return view('front.search', compact('posts','experiments','cancers'));

    }



}
