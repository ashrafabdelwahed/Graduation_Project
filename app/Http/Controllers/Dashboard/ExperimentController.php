<?php

namespace App\Http\Controllers\Dashboard;

use Auth;
use Storage;
use App\Experiment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ExperimentController extends Controller
{

    public function __construct() {

        $this->middleware(['permission:read_experiments'])->only('index');
        $this->middleware(['permission:create_experiments'])->only('create');
        $this->middleware(['permission:update_experiments'])->only('edit');
        $this->middleware(['permission:delete_experiments'])->only('destroy');

    }

    public function index()
    {

        $experiments = Experiment::all();

        return view('admin.experiments.index', compact('experiments'));
    }


    public function create()
    {

        return view('admin.experiments.create');
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

        $request_data['user_id'] = Auth::user()->id;

        if($request_data['user_id'] == 1 ) {
            $request_data['status'] = 1;
        }else {
            $request_data['status'] = 0;
        }


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
        session()->flash('updated', 'تم الاضافة بنجاح');
        return redirect()->route('dashboard.experiments.index');
    }


    public function show(Experiment $experiment)
    {
        return view('admin.experiments.show', compact('experiment'));
    }

    public function edit(Experiment $experiment)
    {

        return view('admin.experiments.edit', compact('experiment'));
    }


    public function update(Request $request, Experiment $experiment)
    {
        $request_data  =  $request->validate([
            'title' => 'required|string',
            'content' => 'required',
            'image'     => 'image',
            'video' => 'mimetypes:video/avi,video/mpeg,video/quicktime,video/x-flv,video/mp4'
        ]);

        $request_data['user_id'] = Auth::user()->id;

        if($request_data['user_id'] == 1 ) {
            $request_data['status'] = 1;
        }else {
            $request_data['status'] = 0;
        }




        if($request->hasFile('video')) {

            if($request->video->getSize() >= '12600000') {
                session()->flash('error', 'يجب تحميل فيديو لا يتخطي 12 ميجا');
            }else {
                Storage::disk('public')->delete($experiment->video);
                $request_data['video'] = $request->video->store('videos/experiments', 'public');
            }
        }

        if ($request->image) {
            Storage::disk('public')->delete($experiment->image);
            $request_data['image'] = $request->image->store('images/experiments', 'public');
        }

        $experiment->update($request_data);
        session()->flash('updated', 'تم التعديل بنجاح');
        return redirect()->route('dashboard.experiments.index');
    }





    public function destroy(Experiment $experiment)
    {

        Storage::disk('public')->delete($experiment->image);
        Storage::disk('public')->delete($experiment->video);
        $experiment->delete();
        session()->flash('deleted', 'تم الحذف بنجاح');
        return redirect()->route('dashboard.experiments.index');
    }




// تعديل حالة التجربة لنشرها
    public function share(Request $request, Experiment $experiment)
    {
        $request_data['status'] = 1;
        $experiment->update($request_data);
        session()->flash('updated', 'تم النشر بنجاح');
        return redirect()->route('dashboard.experiments.index');
    }






}
