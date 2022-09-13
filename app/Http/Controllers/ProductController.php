<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Couleur;
use App\Models\ProductImages;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.produit.index', ['categories' => Categorie::all(), 'produits' => Produit::all()]);
    }
    public function AjouterProduit(Request $request)
    {
        $request->validate(['nom' => 'required', 'description' => 'required',  'stock' => 'required', 'price' => 'required']);
        $produit = new Produit();
        $produit->nom = $request->nom;
        $produit->description = $request->description;
        // $produit->image = $this->UploadImage($request);
        $produit->stock = $request->stock;
        $produit->price = $request->price;
        $produit->categorie_id = $request->categorie;
        if ($produit->save()) {
            return redirect('/admin/produits')->with('ajout', 'Le Produit est ajoutée avec succés');
        } else {
            return 'failed to add produit';
        }
    }
    public function ModifierProduit(Request $request)
    {
        $produit = Produit::findOrFail($request->id);
        //edit 
        if ($produit->update($request->all())) {
            return redirect()->back()->with('edit', 'Le Produit est modifiée avec succés');
        } else {
            return 'failed to edit produit';
        }
    }
    public function SupprimerProduit(Request $request)
    {
        $produit = Produit::find($request->id);
        if ($produit->delete()) {
            return redirect('/admin/produits')->with('delete', 'Le Produit est supprimée avec succés');
        } else {
            return 'failed to delete category';
        }
    }
    public function listeproduits()
    {
        return view('admin.produit.listeproduits', ['categories' => Categorie::all(), 'produits' => Produit::all()]);
    }
}
