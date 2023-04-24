<?php

namespace App\Http\Controllers;

use App\Cancer;
use Illuminate\Http\Request;

class CancerController extends Controller
{



    public  function index() {

        $cancers = Cancer::all();

        return view('front.cancer.index', compact('cancers'));
    }


    public function show($slug) {

        $cancer = Cancer::where('slug',$slug)->first();

        $cancers = Cancer::whereNotIn('slug',[$slug])->limit(5)->get();

        return view('front.cancer.show', compact('cancer','cancers'));

    }

}
