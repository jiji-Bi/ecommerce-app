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
        if (count($commande) != 0) {
            $existe = false;
            foreach ($commande[0]->items as $item) {
                if ($item->variant->id == $variant[0]->id) {
                    $existe = true;
                    $item->quantity += $request->numproduct;
                    $item->update();
                }
            }
            if (!$existe) {
                $itemc = new LigneCommande();
                $itemc->variant_id = $variant[0]->id;
                $itemc->quantity = $request->numproduct;
                $itemc->commande_id = $commande[0]->id;
                $itemc->save();
            }
            return redirect()->back()->with('addpanier', 'Produit ajouté au panier ');
        }
        //creation d'une nouvelle commande
        else {
            $commande   = new Commande();
            $commande->user_id = Auth::user()->id;
            if ($commande->save()) {
                $itemc = new LigneCommande();
                $itemc->commande_id = $commande->id;
                $itemc->variant_id = $variant[0]['id'];
                $itemc->quantity = $request->numproduct;
                $itemc->save();
                return redirect('/client/cart')->with('ajout', 'Produit commandée avec succés');
            } else {
                redirect()->back()->with('Impossible de commander le produit');
            }
        }


        //Création de Ligne de commande si il ya la création d'une commande

    }
}
