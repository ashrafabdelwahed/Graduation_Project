<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'regex:/[^ 0-9]/', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required','numeric'],
            'specialization_id' => ['sometimes:nullable','numeric'],
            'city_id' => ['sometimes:nullable','integer', 'max:255'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }





    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        if ($data['type_of_account'] == 'doctors') {

            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'phone'     => $data['phone'],
                'specialization_id'    => $data['specialization_id'],
                'city_id'   => $data['city_id'],
            ]);

            $user->attachRole('doctors');
            return $user;


        } elseif($data['type_of_account'] == 'volunteers')

        {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'phone'     => $data['phone'],
                'city_id'   => $data['city_id'],
            ]);

            $user->attachRole('volunteers');
            return $user;


        }elseif($data['type_of_account'] == 'patients') {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'phone'     => $data['phone'],
                'city_id'   => $data['city_id'],
            ]);

            $user->attachRole('patients');

            return $user;

        }


    }
}
