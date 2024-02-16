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

/*
Route::get('/blade', function () {
    return view('templete_enging');
});
*/

Route::get('/', function () {
    return view('website.index');
});

Route::get('/404', function () {
    return view('website.404');
});

Route::get('/about', function () {
    return view('website.about');
});

Route::get('/appointment', function () {
    return view('website.appointment');
});

Route::get('/call-to-action', function () {
    return view('website.call-to-action');
});

Route::get('/classes', function () {
    return view('website.classes');
});

Route::get('/contact', function () {
    return view('website.contact');
});

Route::get('/edit_user', function () {
    return view('website.edit_user');
});

Route::get('/facility', function () {
    return view('website.facility');
});


Route::get('/login', function () {
    return view('website.login');
});


Route::get('/signup', function () {
    return view('website.signup');
});


Route::get('/team', function () {
    return view('website.team');
});


Route::get('/testimonial', function () {
    return view('website.testimonial');
});







