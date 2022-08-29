<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
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

Route::get('/landingpage', [HomeController::class, 'index']);
Route::post('/categorie/add', [CategoryController::class, 'AjouterCategory']);
Route::get('/categorie/addform', [CategoryController::class, 'FormAddCategory']);
Route::get('/categorie/list', [CategoryController::class, 'ListerCategory']);
Route::get('/categorie/delete/{id}', [CategoryController::class, 'SupprimerCategory']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
