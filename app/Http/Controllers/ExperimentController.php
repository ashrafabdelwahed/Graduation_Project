<?php

namespace App\Http\Controllers;

use App\Experiment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Auth;

class ExperimentController extends Controller
{



    public  function index() {

        $experiments = Experiment::where('status',1)->orderBy('id','desc')->paginate(8);
        return view('front.experiment.index', compact('experiments'));
    }


    public function show($slug) {

        $experiment = Experiment::where('slug',$slug)->first();
        $experiments = Experiment::inRandomOrder()->where('status', 1)->whereNotIn('slug',[$slug])->limit(6)->get();

        return view('front.experiment.show', compact('experiment','experiments'));

    }


    public function create() {
        return view('front.experiment.create');
    }


    public function store(Request $request)
    {


        $request_data  =  $request->validate([
            'title' => 'required|string',
            'content' => 'required',
            'image'     => 'required|image',
            'video' => 'mimetypes:video/avi,video/mpeg,video/quicktime,video/x-flv,video/mp4'
        ]);

        $request_data['slug'] = Str::slug($request_data['title'], '-');

        $request_data['user_id'] = 1;

        $request_data['status'] = 0;

        if($request->hasFile('video')) {

            if($request->video->getSize() >= '12600000') {
                session()->flash('error', 'يجب تحميل فيديو لا يتخطي 12 ميجا');

                return redirect()->back()->withInput();

            }else {
                $request_data['video'] = $request->video->store('videos/experiments', 'public');
            }
        }


        $request_data['image'] = $request->image->store('images/experiments', 'public');


        Experiment::create($request_data);
        session()->flash('success', 'تمت اضافة تجربتك وقيد المراجعة , شكرا علي دعمك للاخريين');
        return redirect()->route('experiments');
    }



}
