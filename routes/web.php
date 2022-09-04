<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
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

Route::get('/home', [HomeController::class, 'index']);

//This route '/' always gives a redirection to the welcomepage
Route::get('/', [GuestController::class, 'welcomepage']);
Route::get('/welcome', [GuestController::class, 'index']);
//Scaffolded authentification routes 
// Authentication Routes...
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('revalidate');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
// Registration Routes...
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
// Password Reset Routes...
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

//Admin routes 
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard')->middleware('auth', 'revalidate', 'admin');
//Admin produits routes 
Route::get('/admin/produits', [ProductController::class, 'index'])->name('gestion-produits')->middleware('auth', 'revalidate', 'admin');
Route::post('/admin/produit/add', [ProductController::class, 'AjouterProduit'])->name('produits-add')->middleware('auth', 'revalidate', 'admin');
Route::get('/admin/produit/delete/{id}', [ProductController::class, 'SupprimerProduit'])->name('produits-delete')->middleware('auth', 'revalidate', 'admin');
Route::post('/admin/produit/edit', [ProductController::class, 'ModifierProduit'])->name('produits-edit')->middleware('auth', 'revalidate', 'admin');
//Admin categories routes 
Route::get('/admin/categories', [CategoryController::class, 'index'])->name('gestion-categories')->middleware('auth', 'revalidate', 'admin');
Route::post('/admin/categorie/add', [CategoryController::class, 'AjouterCategory'])->name('categories-add')->middleware('auth', 'revalidate', 'admin');
Route::get('/admin/categorie/delete/{id}', [CategoryController::class, 'SupprimerCategory'])->name('categories-delete')->middleware('auth', 'revalidate', 'admin');
Route::post('/admin/categorie/edit', [CategoryController::class, 'ModifierCategory'])->name('categories-edit')->middleware('auth', 'revalidate', 'admin');

//Client routes 
Route::get('/client/dashboard', [ClientController::class, 'dashboard'])->name('client-dashboard')->middleware('auth', 'client');


//testing routes

Route::get('/product/details/{id}', [GuestController::class, 'productDetails']);
