<?php

namespace App\Http\Controllers;

use App\Models\Couleur;
use App\Models\Produit;
use App\Models\Variant;
use App\Models\Commande;
use App\Models\LigneCommande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{
    public function addCommande(Request $request)
    {
        $id = $request->nomproduct;
        $produit = Produit::find($id);
        $couleur = $request->couleurvariant;
        $taille = $request->taille;
        $variant = Variant::select(['id', 'name', 'couleur_id', 'produit_id', 'taille_id', 'quantity', 'prix'])->where('couleur_id', '=', $couleur)->where('taille_id', '=',  $taille)->where('produit_id', '=', $produit->id)->get();

        //Tester si le  user conencté a une commande en cours 

        $commande = Commande::where('user_id', '=', Auth::user()->id)->where('etat', '=', 'en cours')->get();
        if ($commande) {
            $lignecommande = new LigneCommande();
            $lignecommande->variant_id = $variant[0]->id;
            $lignecommande->quantity = $request->numproduct;
            $lignecommande->commande_id = $commande[0]->id;
            $lignecommande->save();
            return redirect('/client/cart');
        }
        //creation d'une nouvelle commande
        else {
            $commande   = new Commande();
            $commande->user_id = Auth::user()->id;
            if ($commande->save()) {
                $lignecommande = new LigneCommande();
                $lignecommande->commande_id = $commande->id;
                $lignecommande->variant_id = $variant[0]['id'];
                $lignecommande->quantity = $request->numproduct;
                $lignecommande->save();
                echo "produit commandé";
            } else {
                redirect()->back()->with('Impossible de commander le produit');
            }
        }


        //Création de Ligne de commande si il ya la création d'une commande

    }
}
