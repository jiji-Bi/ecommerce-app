<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
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

//This route '/' always gives a redirection to the welcomepage
Route::get('/', [WelcomeController::class, 'welcomepage']);
Route::get('/welcome', [WelcomeController::class, 'welcome']);
Route::get('/home', [HomeController::class, 'index']);
//Scaffolded authentification routes 
Auth::routes();

//Admin routes 
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard')->middleware('auth', 'admin');
//Admin produits routes 
Route::get('/admin/produits', [ProductController::class, 'index'])->name('gestion-produits')->middleware('auth', 'admin');
Route::post('/admin/produit/add', [ProductController::class, 'AjouterProduit'])->name('produits-add')->middleware('auth', 'admin');
Route::get('/admin/produit/delete/{id}', [ProductController::class, 'SupprimerProduit'])->name('produits-delete')->middleware('auth', 'admin');
Route::post('/admin/produit/edit', [ProductController::class, 'ModifierProduit'])->name('produits-edit')->middleware('auth', 'admin');
//Admin categories routes 
Route::get('/admin/categories', [CategoryController::class, 'index'])->name('gestion-categories')->middleware('auth', 'admin');
Route::post('/admin/categorie/add', [CategoryController::class, 'AjouterCategory'])->name('categories-add')->middleware('auth', 'admin');
Route::get('/admin/categorie/delete/{id}', [CategoryController::class, 'SupprimerCategory'])->name('categories-delete')->middleware('auth', 'admin');
Route::post('/admin/categorie/edit', [CategoryController::class, 'ModifierCategory'])->name('categories-edit')->middleware('auth', 'admin');

//Client routes 
Route::get('/client/dashboard', [ClientController::class, 'dashboard'])->name('client-dashboard')->middleware('auth', 'client');
