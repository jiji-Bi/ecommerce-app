<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Couleur;
use App\Models\Produit;
use App\Models\Taille;
use App\Models\Variant;
use App\Models\VariantImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $variants = $produit->variants;
        $images = VariantImages::filter(request(['picture']))->get();
        $couleur = DB::table('couleurs')
            ->join('variants', function ($join) {
                $join->on('couleurs.id', '=', 'variants.couleur_id')
                    ->where('variants.id', request(['picture']));
            })->select('couleurs.nom')->get();
            
        //$product = Produit::with('produit')->where('produit_id', $request->produit_id);
        return view('guest.product-detail', [
            'images' => $images,
            'tailles' => $tailles, 'couleurs' => $couleurs,
            'produit' => $produit, 'variants' => $variants,
            'related' => $related, 'categories' => $categories,
            'currentCouleur' => $couleur,
        ]);
    }
    public function categoryProducts($category)
    {
        $categorie = Categorie::find($category);
        $produits = $categorie->produits;
        return view('guest.components.categories_products')->with('produits', $produits);
    }
}
