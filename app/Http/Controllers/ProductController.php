<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function UploadImage(Request $request)
    {
        //Upload product image
        $image = $request->file('image');
        $destinationPath = 'uploads';
        $imagename = uniqid();
        $imagename .= "." . $image->getClientOriginalExtension();
        if ($image->move($destinationPath, $imagename)) {
            return $imagename;
        } else {
            return 'failed to upload product image';
        }
    }
    public function AjouterProduit(Request $request)
    {
        $request->validate(['nom' => 'required', 'description' => 'required', 'image' => 'required', 'stock' => 'required', 'price' => 'required']);
        $produit = new Produit();
        $produit->nom = $request->nom;
        $produit->description = $request->description;
        $produit->image = $this->UploadImage($request);;
        $produit->stock = $request->stock;
        $produit->price = $request->price;
        if ($produit->save()) {
            return redirect()->back()->with('alerte', 'Le Produit est ajoutée avec succés');
        } else {
            return 'failed to add produit';
        }
    }

    public function SupprimerProduit(Request $request)
    {
        $produit = Produit::find($request->id);
        if ($produit->delete()) {
            return redirect('/admin/produits')->with('alerte', 'Le Produit est supprimée avec succés');
        } else {
            return 'failed to delete category';
        }
    }
    public function ModifierProduit(Request $request)
    {
        $request->validate(['nom' => 'required', 'description' => 'required']);
        //$categorie = Categorie::find($request->id);
        // $categorie->nom = $request->nom;
        // $categorie->description = $request->description;
        $produit = Produit::findOrFail($request->id);
        if ($produit->update($request->all())) {
            return redirect()->back()->with('alerte', 'Le Produit est modifiée avec succés');
        } else {
            return 'failed to edit produit';
        }
    }
    public function index()
    {
        return view('produit.index', ['produits' => Produit::all()]);
    }
}
