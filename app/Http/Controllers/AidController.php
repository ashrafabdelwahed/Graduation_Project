<?php

namespace App\Http\Controllers;

use App\Donations;
use Illuminate\Http\Request;

class AidController extends Controller
{

    public function index() {
        return view('front.aid.index');
    }

    public function  stripeCharge(Request $request) {


        $request_data  =  $request->validate([
            'donor' => 'required|string',
            'email' => 'required|string|email',
            'phone' => 'required|numeric',
            'amount' => 'required|numeric',
        ]);



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
        return redirect()->route('aid');

    }



}
