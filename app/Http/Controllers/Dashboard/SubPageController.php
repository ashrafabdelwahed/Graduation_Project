<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubPageController extends Controller
{

    public function index() {

        return view('admin.sub_page.index');

    }


}
