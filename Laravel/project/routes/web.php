<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;

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

// Clear application cache:

Route::get('/cache', function () {
    Artisan::call('cache:clear');
});

//Clear route cache:

Route::get('/route', function () {
    Artisan::call('route:cache');
});
//Clear config cache:

Route::get('/config', function () {
    Artisan::call('config:cache');
});
// Clear view cache:

Route::get('/view', function () {
    Artisan::call('view:clear');
});


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

Route::get('/contact', [ContactController::class, 'create']);
Route::post('/insertcontact', [ContactController::class, 'store']);

Route::get('/edit_user', function () {
    return view('website.edit_user');
});

Route::get('/facility', function () {
    return view('website.facility');
});


Route::get('/login', [CustomerController::class, 'login'])->middleware('userafterlogin');
Route::post('/loginauth', [CustomerController::class, 'loginauth'])->middleware('userafterlogin');
Route::get('/logout', [CustomerController::class, 'logout']);


Route::get('/profile', [CustomerController::class, 'profile'])->middleware('userbeforelogin');
Route::get('/profile/{id}', [CustomerController::class, 'edit'])->middleware('userbeforelogin');
Route::post('/profile/{id}', [CustomerController::class, 'update'])->middleware('userbeforelogin');

Route::get('/signup', [CustomerController::class, 'create'])->middleware('userafterlogin');
Route::post('/insertsignup', [CustomerController::class, 'store'])->middleware('userafterlogin');

Route::get('/team', function () {
    return view('website.team');
});

Route::get('/testimonial', function () {
    return view('website.testimonial');
});


//=========================================================================================

Route::group(['middleware' => ['adminafterlogin']], function () {
    Route::get('/adminlogin', [AdminController::class, 'index']);
    Route::post('/adminloginauth', [AdminController::class, 'adminloginauth']);
});

Route::group(['middleware' => ['adminbeforelogin']], function () {

    Route::get('/adminlogout', [AdminController::class, 'adminlogout']);
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
    Route::get('/manage_categories', [CategoryController::class, 'index']);
    Route::get('/manage_categories/{id}', [CategoryController::class, 'destroy']);
    Route::get('/manage_product', [ProductController::class, 'index']);
    Route::get('/manage_product/{id}', [ProductController::class, 'destroy']);
    Route::get('/manage_employee', [EmployeeController::class, 'index']);
    Route::get('/manage_employee/{id}', [EmployeeController::class, 'destroy']);
    Route::get('/manage_user', [CustomerController::class, 'index']);
    Route::get('/manage_user/{id}', [CustomerController::class, 'destroy']);
    Route::get('/manage_contact', [ContactController::class, 'index']);
    Route::get('/manage_contact/{id}', [ContactController::class, 'destroy']);
    Route::get('/manage_order', function () {
        return view('admin.manage_order');
    });
});
