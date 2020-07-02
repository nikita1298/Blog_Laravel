<?php

use Illuminate\Support\Facades\Cache;
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
    //Cache::put('key', 'Niki',0);
    //dd(Cache::get('key'));
    echo "<script type='text/javascript'>alert('Hello Select one ');</script>";
    return view('welcome');
});
Route::get('/LogOut', function () {
    session_start();
    session_destroy();
    return view('welcome');
});

Route::get('/Registeration', function () {
    return view('Register');
});

Route::get('/Login', function () {
    return view('Login');
});
Route::get('/ViewBlog', function () {
    return view('ViewBlog');
});


Route::resource('/BlogController', 'BlogController');

Route::resource('/Registerme', 'UserController');
Route::post('/Loginme', 'UserController@Login');

//------BLOG CONTROLLER----------------//
Route::post('/insertBlog','BlogController@store');


