<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/welcome', [WelcomeController::class, 'welcome']);
//This route '/' always gives a redirection to the welcomepage
Route::get('/', [WelcomeController::class, 'welcomepage']);
Route::get('/home', [HomeController::class, 'index']);
Auth::routes();
Route::get('/client/dashboard', [ClientController::class, 'dashboard'])->name('client-dashboard');

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');
Route::get('/admin/categories', [CategoryController::class, 'index'])->name('categories-list');;
