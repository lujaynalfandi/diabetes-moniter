<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'admin', 'middleware'=>'auth' ], function () {
    Route::resource('/users', 'UserController');
    Route::resource('/Patients', 'PatientController');


});


Route::get('/test', function () {
    return view('test');
}); 

//Route::get('/Dhome', 'doctorController@fetch_data')->middleware('auth')->name('Dhome');
    Route::resource('/advice', 'AdviceController')->middleware('auth');


    Route::get('/home', 'HomeController@index')->middleware('isadmin')->name('home');
    Route::get('/Dhome', 'doctorController@fetch_data')->middleware('isadoctor')->name('Dhome');
    Route::resource('profile', 'profileController')->middleware('auth');

    Route::get('change-password', 'ChangePasswordController@index')->name('changepass');

Route::post('change-password', 'ChangePasswordController@store')->name('change.password');

