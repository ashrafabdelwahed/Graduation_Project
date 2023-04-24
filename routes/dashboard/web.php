<?php

use Illuminate\Http\Request;




Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {




    Route::get('/', 'HomeController@index')->name('home');

    // Massage  for Patients
    Route::resource('msg', 'MsgController')->except(['edit','update']);


    // // Doctors Route
    Route::resource('doctors', 'DoctorController')->except(['show','create','store']);

    // // Volunteers Route
    Route::resource('volunteers', 'VolunteerController')->except(['show','create','store']);

    // // Patients Route
    Route::resource('patients', 'PatientController')->except(['show','create','store']);

    // // Categories Route
    Route::resource('categories', 'CategoryController')->except(['create']);

    // // Experiments Route
    Route::resource('experiments', 'ExperimentController');
    Route::post('experiment/share/{experiment}','ExperimentController@share')->name('experiments.share');


    // Posts Route
    Route::resource('posts', 'PostController');



    // Posts Route
    Route::resource('awareness/cancer', 'CancerController');


    // Sub Page
        // Route::get('sub/page', 'SubPageController@index')->name('sub_page');



    // profile Page
    Route::get('profile', 'ProfileController@index')->name('profile');
    Route::post('profile', 'ProfileController@update')->name('profile.update');
    Route::get('profile/change/password', 'ProfileController@change_password')->name('profile.change_password');
    Route::post('profile/change/password', 'ProfileController@update_password')->name('profile.update_password');



    // Aid Routes
    Route::get('aid/money', 'AidController@money')->name('aid.money');
    // Route::post('payment/process', 'AidController@payment')->name('payment');
    Route::post('stripe/charge', 'AidController@stripeCharge')->name('stripe.charge');

    Route::get('aid', 'AidController@index')->name('aid.index');




    // for test
    Route::get('test', function () {
        return view('admin.test');
    });

});

