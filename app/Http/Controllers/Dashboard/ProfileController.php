<?php

namespace App\Http\Controllers\Dashboard;

use Auth;
use App\City;
use App\User;
use App\Specialization;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function index()
    {

        $user = Auth::user();
        $cities = City::all();
        $specializations = Specialization::all();

        return view('admin.profile.index', compact('user','cities','specializations'));
    }


    public function update(Request $request)
    {

        $user  =  Auth::user();

        if($user->hasRole('doctors')) {

            $request_data  =  $request->validate([
                'name' => 'required|string',
                'email'     => ['required',Rule::unique('users')->ignore($user->id),],
                'phone' => 'required|numeric',
                'city_id' => 'required',
                'specialization_id' => 'required|numeric',
            ]);
        }else {
            $request_data  =  $request->validate([
                'name' => 'required|string',
                'email'     => ['required',Rule::unique('users')->ignore($user->id),],
                'phone' => 'required|numeric',
                'city_id' => 'required',
            ]);
        }

        $user->update($request_data);
        session()->flash('updated', 'تم التعديل بنجاح');
        return back();

    }

    public function change_password() {
        $user = Auth::user();
        return view('admin.profile.change_password', compact('user'));
    }


    public function update_password(Request $request) {


        $user = Auth::user();

        $request_data  =  $request->validate([
            'old_password' => 'required',
            'password' => 'confirmed|min:6|different:old_password',
        ]);



        if(Hash::check($request->old_password, $user->password)) {

            $user->update(['password'=> Hash::make($request_data['password'])]);
            session()->flash('updated', 'تم التعديل بنجاح');
            return redirect()->route('dashboard.profile.change_password');
        }else {
            session()->flash('error', 'كلمة المرور القديمة غير مطابقة');
            return redirect()->route('dashboard.profile.change_password');        }

    }

}
// 'password' => ['required', 'string', 'min:6', 'confirmed'],
