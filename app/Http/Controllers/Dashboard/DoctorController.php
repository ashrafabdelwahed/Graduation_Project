<?php

namespace App\Http\Controllers\Dashboard;

use App\City;
use App\User;
use App\Specialization;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class DoctorController extends Controller
{

    public function __construct() {

        $this->middleware(['permission:read_users'])->only('index');
        $this->middleware(['permission:create_users'])->only('create');
        $this->middleware(['permission:update_users'])->only('edit');
        $this->middleware(['permission:delete_users'])->only('destroy');

    }


    public function index()
    {
        $doctors = User::whereRoleIs('doctors')->get();

        return view('admin.users.doctors.index', compact('doctors'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(User $user)
    {
        //
    }

    public function edit($id)
    {

        $user = User::find($id);
        $cities = City::all();
        $specializations = Specialization::all();

        return view('admin.users.doctors.edit', compact('user','cities','specializations'));

    }


    public function update(Request $request, $id)
    {




        $request_data  =  $request->validate([
            'name' => 'required|string',
            'email'     => ['required',Rule::unique('users')->ignore($id),],
            'phone' => 'required|numeric',
            'city_id' => 'required',
            'specialization_id' => 'required|numeric',

        ]);

        User::find($id)->update($request_data);

        session()->flash('updated', 'تم التعديل بنجاح');
        return redirect()->route('dashboard.doctors.index');

    }


    public function destroy($id)
    {
        User::find($id)->delete();
        session()->flash('deleted', 'تم الحذف بنجاح');
        return redirect()->route('dashboard.doctors.index');
    }
}
