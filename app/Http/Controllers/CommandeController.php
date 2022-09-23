<?php

namespace App\Http\Controllers;

use App\Models\Couleur;
use App\Models\Produit;
use App\Models\Variant;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function addCommande(Request $request)
    {
        $id = $request->nomproduct;
        $produit = Produit::find($id);
        $couleur = $request->couleurvariant;
        $taille = $request->taille;
        $variant = Variant::select(['id', 'name', 'couleur_id', 'produit_id', 'taille_id', 'quantity', 'prix'])->where('couleur_id', '=', $couleur)->where('taille_id', '=',  $taille)->where('produit_id', '=', $produit->id)->get();
        dd($request);
    }
}
