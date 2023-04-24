<?php

namespace App\Http\Controllers\Dashboard;

use App\Post;
use App\User;
use App\Category;
use App\Donations;
use App\Experiment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{


    public  function  index() {

        // عدد المشرفين
        $super_admin = User::whereRoleIs('super_admin')->count();

        // عدد الدكاترة
        $doctors = User::whereRoleIs('doctors')->count();

        // عدد المتطوعين
        $volunteers = User::whereRoleIs('volunteers')->count();

        //  عدد المرضى
        $patients = User::whereRoleIs('patients')->count();

        $categories  = Category::count();
        $experiments  = Experiment::count();
        $posts  = Post::count();


        $categories_latest  = Category::orderBy('id','desc')->limit(5)->get();
        $experiments_latest  = Experiment::orderBy('id','desc')->limit(5)->get();
        $donations = Donations::all();




        return view('admin.home', compact('super_admin', 'doctors', 'volunteers', 'patients',
                                                            'categories','experiments','posts','categories_latest','experiments_latest','donations'));

    }


}
