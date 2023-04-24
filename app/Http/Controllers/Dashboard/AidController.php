<?php

namespace App\Http\Controllers\Dashboard;

use App\Donations;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AidController extends Controller
{


    public function index() {

        $donations = Donations::all();
        return view('admin.aid.index', compact('donations'));

    }

    public function money() {

        $user = Auth::user();

        return view('admin.aid.money', compact('user'));
    }


    public function  stripeCharge(Request $request) {



        $request_data  =  $request->validate([
            'amount' => 'required|numeric',
        ]);

        $request_data['donor'] = Auth::user()->name;
        $request_data['email'] = Auth::user()->email;
        $request_data['phone'] = Auth::user()->phone;

        // Set your secret key. Remember to switch to your live secret key in production!
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey('sk_test_xxSTwf4NLYUl1AoPh5GCLHud00eSZOESSK');

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
        'amount' => $request->amount * 100,
        'currency' => 'egp',
        'description' => 'تبرع لدعم مرضي السرطان',
        'source' => $token,
        'metadata' => ['order_id' => uniqid()],
        ]);

        if($charge) {
            Donations::create($request_data);
        }

        session()->flash('success', 'شكراً لك على دعمك للمرضى');
        return redirect()->route('dashboard.aid.index');

    }




    // public function test() {

    //     $stripe = new \Stripe\StripeClient(
    //         'sk_test_xxSTwf4NLYUl1AoPh5GCLHud00eSZOESSK'
    //       );

    //     $test  =  $stripe->transfers->all(['limit' => 3]);

    //     dd($test);


    // }

}
