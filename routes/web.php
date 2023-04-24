<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// الصفحة الرئيسية
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

// البحث
Route::post('search', 'HomeController@search')->name('search');




// التوعية بالسرطان
Route::get('/cancer', 'CancerController@index')->name('cancer');
Route::get('/cancer/{slug}', 'CancerController@show')->name('cancer.show');


// المقالات والاقسام
Route::get('/categories', 'CategoryController@index')->name('categories');
Route::get('/category/{slug}', 'CategoryController@show')->name('category.show');
Route::get('/post/{slug}', 'PostController@show')->name('post.show');


// التجارب
Route::get('/experiments', 'ExperimentController@index')->name('experiments');
Route::get('/experiment/create', 'ExperimentController@create')->name('experiment.create');
Route::post('/experiment/store', 'ExperimentController@store')->name('experiment.store');
Route::get('/experiment/{slug}', 'ExperimentController@show')->name('experiment.show');



// التجارب
Route::get('money/aid', 'AidController@index')->name('aid');
Route::post('stripe/charge', 'AidController@stripeCharge')->name('stripe.charge');





// Route::get('/experiment/{slug}', 'AidController@show')->name('aid.');

