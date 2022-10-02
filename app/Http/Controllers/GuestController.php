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

        $produit = Produit::find($id);
        $variant_id = $request->query('picture');

        $variant = Variant::find($variant_id);

        $couleurs = Couleur::all();
        $tailles = Taille::all();

        $related = Produit::where('id', '!=', $id)->get();
        $categories = Categorie::all();

        $variants = $produit->variants;
        // $distinct_variants = Variant::select('variants')
        //     ->groupBy(['couleur_id', 'produit_id'])->select('couleur_id', 'produit_id')
        //     ->get();

        $distinct_variants =  Variant::groupBy(['couleur_id', 'produit_id'])->select('couleur_id', 'produit_id', DB::raw('count(*) as total'))->get();
        // select couleur_id ,produit_id,count(*) from variants GROUP BY produit_id, couleur_id;

        foreach ($distinct_variants as $key => $value1) {
            if ($value1['total'] > 1)
                $firstvalues[] = Variant::where('couleur_id', '=', $value1['couleur_id'])->where('produit_id', '=', $value1['produit_id'])->get();
        }
        $images = VariantImages::filter(request(['picture']))->get();

        $couleur = DB::table('couleurs')
            ->join('variants', function ($join) {
                $join->on('couleurs.id', '=', 'variants.couleur_id')
                    ->where('variants.id', request(['picture']));
            })->select('couleurs.nom', 'couleurs.id')->get();
        //$product = Produit::with('produit')->where('produit_id', $request->produit_id);

        return view('guest.product-detail', [
            'images' => $images,
            'tailles' => $tailles, 'couleurs' => $couleurs,
            'produit' => $produit, 'variants' => $variants, 'distinct_variants' => $distinct_variants,
            'related' => $related, 'categories' => $categories,
            'currentCouleur' => $couleur, 'firstvalues' => $firstvalues,
            'variant' => $variant
        ]);
    }
    public function categoryProducts($category)
    {
        $categorie = Categorie::find($category);
        $produits = $categorie->produits;
        return view('guest.components.categories_products')->with('produits', $produits);
    }
}
