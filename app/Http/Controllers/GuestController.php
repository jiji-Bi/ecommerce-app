<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Couleur;
use App\Models\Produit;
use App\Models\Taille;
use App\Models\Variant;
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
        $variants = Variant::all();
        $couleurs = Couleur::all();
        return view('guest.index', ['categories' => $categories, 'couleurs' => $couleurs, 'variants' => $variants, 'produits' => $produits]);
    }
    public function productDetails($id, Request $request)
    {
        $couleurs = Couleur::all();
        $tailles = Taille::all();

        $produit = Produit::find($id);
        $variant = Variant::find($id);

        $related = Produit::where('id', '!=', $id)->get();
        $categories = Categorie::all();
        $variants = Variant::all();
        $product = Produit::with('produit')->where('produit_id', $request->produit_id);
        return view('guest.product-detail', ['tailles' => $tailles, 'couleurs' => $couleurs, 'product' => $product, 'variant' =>  $variant, 'produit' => $produit, 'variants' => $variants, 'related' => $related, 'categories' => $categories]);
    }
}
