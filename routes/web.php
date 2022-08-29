<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WelcomeController;
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

Route::post('/categorie/add', [CategoryController::class, 'AjouterCategory']);
Route::get('/categorie/addform', [CategoryController::class, 'FormAddCategory']);
Route::get('/categorie/list', [CategoryController::class, 'ListerCategory']);
Route::get('/categorie/delete/{id}', [CategoryController::class, 'SupprimerCategory']);
Route::get('/welcome', [WelcomeController::class, 'welcome']);
Route::get('/', [WelcomeController::class, 'welcomepage']);
Route::get('/home', [HomeController::class, 'index']);

Auth::routes();
