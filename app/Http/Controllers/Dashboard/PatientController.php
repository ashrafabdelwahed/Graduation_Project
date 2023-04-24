<?php

namespace App\Http\Controllers\Dashboard;

use App\City;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class PatientController extends Controller
{


    public function __construct() {

        $this->middleware(['permission:read_users'])->only('index');
        $this->middleware(['permission:create_users'])->only('create');
        $this->middleware(['permission:update_users'])->only('edit');
        $this->middleware(['permission:delete_users'])->only('destroy');

    }

    public function index()
    {
        $patients = User::whereRoleIs('patients')->get();

        return view('admin.users.patients.index', compact('patients'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show()
    {
        //
    }


    public function edit($id)
    {

        $user = User::find($id);

        $cities = City::all();

        return view('admin.users.patients.edit', compact('user','cities'));

    }


    public function update(Request $request, $id)
    {

        $request_data  =  $request->validate([
            'name' => 'required|string',
            'email'     => ['required',Rule::unique('users')->ignore($id),],
            'phone' => 'required|numeric',
            'city_id' => 'required',
        ]);

        User::find($id)->update($request_data);

        session()->flash('updated', 'تم التعديل بنجاح');
        return redirect()->route('dashboard.patients.index');

    }


    public function destroy($id)
    {
        User::find($id)->delete();
        session()->flash('deleted', 'تم الحذف بنجاح');
        return redirect()->route('dashboard.patients.index');
    }
}
