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
        return view('guest.index', ['categories' => $categories, 'couleurs' => $couleurs, 'variants' => $variants, 'produits' => $produits/*->Simplepaginate('6')*/]);
    }
    public function productDetails($id, Request $request)
    {
        $couleurs = Couleur::all();
        $tailles = Taille::all();
        $produit = Produit::find($id);
        $related = Produit::where('id', '!=', $id)->get();
        $categories = Categorie::all();
        $couleur = $request->couleur;
        $variants = Variant::all();
        $variations = Variant::latest()->filter(request(['couleur']));
        $product = Produit::with('produit')->where('produit_id', $request->produit_id);
        return view('guest.product-detail', [
            'variations' => $variations,
            'couleur' => $couleur, 'tailles' => $tailles, 'couleurs' => $couleurs,
            'product' => $product, 'produit' => $produit, 'variants' => $variants,
            'related' => $related, 'categories' => $categories,
            'currentCouleur' => Couleur::firstWhere('nom', request('couleur'))
        ]);
    }
    public function categoryProducts($category)
    {
        $categorie = Categorie::find($category);
        $produits = $categorie->produits;
        return view('guest.components.categories_products')->with('produits', $produits);
    }
}
