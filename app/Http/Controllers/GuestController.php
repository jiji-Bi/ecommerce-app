<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function welcomepage()
    {
        return redirect('welcome');
    }

    public function index()
    {
        $categories = Categorie::all();
        $produits = Produit::all();
        return view('guest.index', ['categories' => $categories, 'produits' => $produits]);
    }
    public function productDetails()
    {
        return view('guest.product-detail');
    }
}
