<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommandeController;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VariantController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\TailleController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

use App\Http\Livewire\FrontOffice\Gallery;

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
Route::get('/product/{category}/list', [GuestController::class, 'categoryProducts']);
Route::post('/client/review/add', [ClientController::class, 'addReview'])->middleware('auth', 'client');
Route::post('/client/order/add', [CommandeController::class, 'addCommande'])->middleware('auth', 'client');
Route::get('/client/cart', [ClientController::class, 'indexCart'])->middleware('auth', 'client');

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
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard')->middleware('auth', 'revalidate');

//Admin produits routes 
Route::get('/admin/produit', [ProductController::class, 'index'])->middleware('auth', 'revalidate', 'admin');
Route::get('/admin/produits', [ProductController::class, 'listeproduits'])->name('gestion-produits')->middleware('auth', 'revalidate', 'admin');
Route::post('/admin/produit/add', [ProductController::class, 'AjouterProduit'])->name('produits-add')->middleware('auth', 'revalidate', 'admin');
Route::get('/admin/produit/delete/{id}', [ProductController::class, 'SupprimerProduit'])->name('produits-delete')->middleware('auth', 'revalidate', 'admin');
Route::get('/admin/produit/{id}/edit', [ProductController::class, 'EditPageProduit'])->middleware('auth', 'revalidate', 'admin');
Route::post('/admin/produit/{id}', [ProductController::class, 'ModifierProduit'])->name('produits-edit')->middleware('auth', 'revalidate', 'admin');
//Admin variants routes 
Route::get('/admin/produit/{id}/variants/', [VariantController::class, 'listevariants'])->middleware('auth', 'revalidate', 'admin');
Route::get('/admin/variant/delete/{id}', [VariantController::class, 'SupprimerVariant'])->middleware('auth', 'revalidate', 'admin');
Route::get('/admin/variant-image/{id}/delete', [VariantController::class, 'SupprimerImageRecord'])->middleware('auth', 'revalidate', 'admin');
Route::post('/admin/variants/edit', [VariantController::class, 'ModifierVariant'])->middleware('auth', 'revalidate', 'admin');

//Admin couleurs routes 
Route::get('/admin/couleurs', [ColorController::class, 'listecouleurs'])->name('couleurs-liste')->middleware('auth', 'revalidate', 'admin');
Route::post('/admin/couleur/add', [ColorController::class, 'AjouterCouleur'])->name('couleurs-ajouter')->middleware('auth', 'revalidate', 'admin');
Route::get('/admin/couleur/delete/{id}', [ColorController::class, 'SupprimerCouleur'])->middleware('auth', 'revalidate', 'admin');
Route::post('/admin/couleur/edit', [ColorController::class, 'ModifierCouleur'])->middleware('auth', 'revalidate', 'admin');

//Admin tailles routes 
Route::get('/admin/tailles', [TailleController::class, 'listetailles'])->middleware('auth', 'revalidate', 'admin');
Route::post('/admin/taille/add', [TailleController::class, 'AjouterTaille'])->middleware('auth', 'revalidate', 'admin');
Route::get('/admin/taille/delete/{id}', [TailleController::class, 'SupprimerTaille'])->middleware('auth', 'revalidate', 'admin');
Route::post('/admin/taille/edit', [TailleController::class, 'ModifierTaille'])->middleware('auth', 'revalidate', 'admin');

//Admin categories routes 
Route::get('/admin/categories', [CategoryController::class, 'index'])->name('gestion-categories')->middleware('auth', 'revalidate', 'admin');
Route::post('/admin/categorie/add', [CategoryController::class, 'AjouterCategory'])->name('categories-add')->middleware('auth', 'revalidate', 'admin');
Route::get('/admin/categorie/delete/{id}', [CategoryController::class, 'SupprimerCategory'])->name('categories-delete')->middleware('auth', 'revalidate', 'admin');
Route::post('/admin/categorie/edit', [CategoryController::class, 'ModifierCategory'])->name('categories-edit')->middleware('auth', 'revalidate', 'admin');


//Client routes 
Route::get('/client/dashboard', [ClientController::class, 'dashboard'])->name('client-dashboard')->middleware('auth', 'client');


//Specific Route (post request(ajax) and http request get)
Route::any('/product/details/{id}', [GuestController::class, 'productDetails']);
