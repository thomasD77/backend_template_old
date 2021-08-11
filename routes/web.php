<?php

use Illuminate\Support\Facades\Auth;
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

// General settings
Auth::routes(['verify'=> true]);

// Example Routes
Route::view('/', 'landing');
Route::match(['get', 'post'], '/dashboard', function(){
    return view('admin/dashboard');
});
Route::view('/pages/slick', 'pages.slick');
Route::view('/pages/datatables', 'pages.datatables');
Route::view('/pages/blank', 'pages.blank');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Backend Routes
Route::group(['prefix'=>'admin', 'middleware'=>[ 'auth', 'verified']], function(){
    Route::get('/', [App\Http\Controllers\AdminHomeController::class, 'index'])->name('admin.home');
    Route::resource('users', App\Http\Controllers\AdminUsersController::class);
    Route::resource('roles', App\Http\Controllers\AdminRolesController::class);
    Route::resource('billing', App\Http\Controllers\AdminBillingController::class);
    Route::resource('products', App\Http\Controllers\AdminProductsController::class);
    Route::resource('submissions', App\Http\Controllers\AdminSubmissionController::class);
    Route::post('password/{id}', 'App\Http\Controllers\AdminUsersController@updatePassword');
});
