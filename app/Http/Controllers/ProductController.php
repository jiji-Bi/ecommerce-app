<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

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
        $produit->image = $this->UploadImage($request);
        $produit->stock = $request->stock;
        $produit->price = $request->price;
        $produit->categorie_id = $request->categorie;

        if ($produit->save()) {
            return redirect()->back()->with('alerte', 'Le Produit est ajoutée avec succés');
        } else {
            return 'failed to add produit';
        }
    }
    public function SupprimerImage($produit)
    {
        $path = public_path()  . '/uploads/' . $produit->image;
        unlink($path);
    }
    public function SupprimerProduit(Request $request)
    {
        $produit = Produit::find($request->id);
        $this->SupprimerImage($produit);
        if ($produit->delete()) {
            return redirect('/admin/produits')->with('alerte', 'Le Produit est supprimée avec succés');
        } else {
            return 'failed to delete category';
        }
    }
    public function ModifierProduit(Request $request)
    {
        $produit = Produit::findOrFail($request->id);
        if ($request->file('image')) {
            $this->SupprimerImage(Produit::findOrFail($request->id));

            $produit->image = $this->UploadImage($request);
        }
        $values =  Arr::except($request->all(), ['image']);
        if ($produit->update($values)) {
            return redirect()->back()->with('alerte', 'Le Produit est modifiée avec succés');
        } else {
            return 'failed to edit produit';
        }
    }
    public function index()
    {
        return view('admin.produit.index', ['categories' => Categorie::all(), 'produits' => Produit::all()]);
    }
}
