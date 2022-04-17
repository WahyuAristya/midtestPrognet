<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginControllerAdmin;
use App\Http\Controllers\DashboardController;
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



Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('landing')->middleware('verified');

Auth::routes();

Route::get('/home', [App\Http\Controllers\User\DashboardController::class, 'index'])->name('home');

Route::resource('/dashboard', App\Http\Controllers\User\DashboardController::class);
Route::resource('/keluhan', App\Http\Controllers\User\KeluhanController::class);


Route::get('/admin', [App\Http\Controllers\LoginControllerAdmin::class, 'loginAdmin'])->name('loginadmin');
Route::post('actionlogin', [App\Http\Controllers\LoginControllerAdmin::class, 'action'])->name('actionlogin');
Route::get('logoutAdmin', [App\Http\Controllers\LoginControllerAdmin::class, 'logoutAdmin'])->name('logoutadmin');

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
  Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardAdminController::class, 'index'])->name ('dashboardAdmin');
    });
Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
  Route::resource('/reply', App\Http\Controllers\Admin\ReplyController::class);
    });
Auth::routes();

Auth::routes(['verify' => true]);