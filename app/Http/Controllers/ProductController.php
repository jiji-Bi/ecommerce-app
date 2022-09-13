<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Couleur;
use App\Models\ProductImages;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use App\Models\Variant;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.produit.index', ['categories' => Categorie::all(), 'produits' => Produit::all()]);
    }
    public function UploadImage($imagefile)
    {
        //Upload product image
        $destinationPath = 'uploads';
        $imagename = uniqid();
        $imagename .= "." . $imagefile->getClientOriginalExtension();
        if ($imagefile->move($destinationPath, $imagename)) {
            return $imagename;
        } else {
            return 'failed to upload product image';
        }
    }
    public function AjouterVariant(Request $request, $produit_id)
    {
        $variant = new Variant();

        $request->validate([
            'moreFields.*.nom' => 'required', 'moreFields.*.quantity' => 'required', 'moreFields.*.price' => 'required'
        ]);

        foreach ($request->moreFields as  $key => $value) {
            $variant = $variant->create(['nom' =>  $value['nom'], 'price' => $value['price'], 'quantity' =>  $value['quantity'], 'couleur_id' => $value['couleur_id'], 'taille_id' => $value['taille_id'], 'produit_id' => $produit_id]);
        }
        if ($variant->save()) {
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $imagefile) {

                    $variant->images()->create(['variant_id' => $variant->id, 'image' => $this->UploadImage($imagefile)]);
                }
            }
        }
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
        //Variant controller  
        if ($produit->save()) {
            if ($request->images) {
                $produit_id = $produit->id;
                $this->AjouterVariant($request, $produit_id);
            }
            return redirect('/admin/produits')->with('ajout', 'Le Produit est ajoutée avec succés');
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
