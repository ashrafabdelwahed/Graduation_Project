<?php

namespace App\Http\Controllers\Dashboard;

use App\Cancer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Storage;

class CancerController extends Controller
{

    public function __construct() {

        $this->middleware(['permission:read_cancer'])->only('index');
        $this->middleware(['permission:create_cancer'])->only('create');
        $this->middleware(['permission:update_cancer'])->only('edit');
        $this->middleware(['permission:delete_cancer'])->only('destroy');

    }

    public function index()
    {

        $cancers = Cancer::all();

        return view('admin.cancers.index', compact('cancers'));
    }


    public function create()
    {

        return view('admin.cancers.create');
    }


    public function store(Request $request)
    {
        $request_data  =  $request->validate([
            'name' => 'required|string',
            'content' => 'required|string',
            'risk_factors' => 'required',
            'early_symptoms' => 'required',
            'protection' => 'required',
            'early_detection' => 'required',

            'image'     => 'required|image',
            'video' => 'mimetypes:video/avi,video/mpeg,video/quicktime,video/x-flv,video/mp4'
        ]);

        $request_data['slug'] = Str::slug($request_data['name'], '-');




        if($request->hasFile('video')) {

            if($request->video->getSize() >= '12600000') {
                session()->flash('error', 'يجب تحميل فيديو لا يتخطي 12 ميجا');

                return redirect()->back()->withInput();

            }else {
                $request_data['video'] = $request->video->store('videos/cancers', 'public');
            }
        }


        $request_data['image'] = $request->image->store('images/cancers', 'public');


        Cancer::create($request_data);
        session()->flash('updated', 'تم الاضافة بنجاح');
        return redirect()->route('dashboard.cancer.index');
    }


    public function show(Cancer $cancer)
    {
        return view('admin.cancers.show', compact('cancer'));
    }

    public function edit(Cancer $cancer)
    {

        return view('admin.cancers.edit', compact('cancer'));
    }


    public function update(Request $request, Cancer $cancer)
    {
        $request_data  =  $request->validate([
            'name' => 'required|string',
            'content' => 'required|string',
            'risk_factors' => 'required',
            'early_symptoms' => 'required',
            'protection' => 'required',
            'early_detection' => 'required',

            'image'     => 'image',
            'video' => 'mimetypes:video/avi,video/mpeg,video/quicktime,video/x-flv,video/mp4'
        ]);



        if($request->hasFile('video')) {

            if($request->video->getSize() >= '12600000') {
                session()->flash('error', 'يجب تحميل فيديو لا يتخطي 12 ميجا');
            }else {
                Storage::disk('public')->delete($cancer->video);
                $request_data['video'] = $request->video->store('videos/cancers', 'public');
            }
        }

        if ($request->image) {
            Storage::disk('public')->delete($cancer->image);
            $request_data['image'] = $request->image->store('images/cancers', 'public');
        }

        $cancer->update($request_data);
        session()->flash('updated', 'تم التعديل بنجاح');
        return redirect()->route('dashboard.cancer.index');
    }





    public function destroy(Cancer $cancer)
    {

        Storage::disk('public')->delete($cancer->image);
        Storage::disk('public')->delete($cancer->video);
        $cancer->delete();
        session()->flash('deleted', 'تم الحذف بنجاح');
        return redirect()->route('dashboard.cancer.index');
    }



}
