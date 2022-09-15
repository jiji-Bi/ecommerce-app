<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Couleur;
use App\Models\Taille;
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
        return view('admin.produit.create', ['categories' => Categorie::all(), 'produits' => Produit::all(), 'couleurs' => Couleur::all(), 'tailles' => Taille::all()]);
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
        $request->validate([
            'moreFields.*.name' => 'required', 'moreFields.*.quantity' => 'required', 'moreFields.*.prix' => 'required'
        ]);
        foreach ($request->moreFields as $k => $input) {
            $variant = Variant::create(['name' =>  $input['name'], 'prix' => $input['prix'], 'quantity' =>  $input['quantity'], 'couleur_id' => $request->couleur, 'taille_id' => $request->couleur, 'produit_id' => $produit_id]);
            $currentv = $variant->id;
            if ($request->images) {
                foreach ($request->images as $i => $image) {
                    if ($i == $k) {
                        foreach ($image as $imagefile) {
                            $variant->images()->create(['variant_id' => $currentv, 'image' => $this->UploadImage($imagefile)]);
                        }
                    }
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
        if ($produit->save()) {
            foreach ($request->moreFields as $key => $value) {
                if ($value['name'] == null || $value['prix'] == null || $value['quantity'] == null) {
                    return redirect('/admin/produits')->with('edit', 'Le Produit est ajoutée avec succés');
                }
            }
        }
        $produit_id = $produit->id;
        $this->AjouterVariant($request, $produit_id);
        return redirect('/admin/variants')->with('edit', 'Le Variant est ajoutée avec succés');
    }
    public function ModifierProduit(Request $request)
    {
        $produit = Produit::findOrFail($request->id);
        if ($produit->update($request->all())) {
            foreach ($request->moreFields as $key => $value) {
                if ($value['name'] == null || $value['prix'] == null || $value['quantity'] == null) {
                    return redirect('/admin/produits')->with('edit', 'Le Produit est modifiée avec succés');
                }
            }
        }
        $produit_id = $produit->id;
        $this->AjouterVariant($request, $produit_id);
        return redirect('/admin/variants')->with('ajout', 'Le Variant est ajoutée avec succés');
    }
    public function EditPageProduit(Request $request)
    {
        $produit = Produit::findOrFail($request->id);
        $categories = Categorie::all();
        return view('admin.produit.edit')->with('categories', $categories)->with('produit', $produit)->with('couleurs', Couleur::all())->with('tailles', Taille::all());
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
