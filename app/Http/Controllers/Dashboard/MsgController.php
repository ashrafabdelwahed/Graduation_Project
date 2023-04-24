<?php

namespace App\Http\Controllers\Dashboard;

use App\Msg;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MsgController extends Controller
{

    public function __construct() {

        $this->middleware(['role:super_admin'])->only('index');
        $this->middleware(['role:super_admin'])->only('create');
        $this->middleware(['role:super_admin'])->only('edit');
        $this->middleware(['role:super_admin'])->only('destroy');

    }

    public function index()
    {
        $msgs = Msg::all();

        return view('admin.msg.index', compact('msgs'));
    }

    public function create()
    {
        return view('admin.msg.create');
    }


    public function store(Request $request)
    {
        $request_data  =  $request->validate([
            'image'     => 'required|image',
        ]);


        $request_data['image'] = $request->image->store('images/msg', 'public');


        Msg::create($request_data);
        session()->flash('updated', 'تم الاضافة بنجاح');
        return redirect()->route('dashboard.msg.index');


    }


    public function show(Msg $msg)
    {
        return view('admin.msg.show', compact('msg'));
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy(Msg $msg)
    {
        Storage::disk('public')->delete($msg->image);
        $msg->delete();
        session()->flash('deleted', 'تم الحذف بنجاح');
        return redirect()->route('dashboard.msg.index');
    }
}
