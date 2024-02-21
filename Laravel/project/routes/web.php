<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;


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

//Route::get('/contact', function () {return view('website.contact');});

Route::get('/contact',[ContactController::class,'create']);


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


//=========================================================================================


Route::get('/adminlogin', function () {
    return view('admin.index');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/add_categories', function () {
    return view('admin.add_categories');
});




Route::get('/add_product', function () {
    return view('admin.add_product');
});



Route::get('/manage_product', function () {
    
});

Route::get('/add_employee', function () {
    return view('admin.add_employee');
});

Route::get('/manage_categories',[CategoryController::class,'index']);
Route::get('/manage_categories/{id}',[CategoryController::class,'destroy']);

Route::get('/manage_product',[ProductController::class,'index']);
Route::get('/manage_product/{id}',[ProductController::class,'destroy']);

Route::get('/manage_employee',[EmployeeController::class,'index']);
Route::get('/manage_employee/{id}',[EmployeeController::class,'destroy']);


Route::get('/manage_user',[CustomerController::class,'index']);
Route::get('/manage_user/{id}',[CustomerController::class,'destroy']);

Route::get('/manage_contact',[ContactController::class,'index']);
Route::get('/manage_contact/{id}',[ContactController::class,'destroy']);


Route::get('/manage_order', function () {
    return view('admin.manage_order');
});


