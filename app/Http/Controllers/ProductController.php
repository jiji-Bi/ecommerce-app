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
            'moreFields.*.name' => 'required', 'moreFields.*.quantity' => 'required', 'moreFields.*.prix' => 'required', 'images' => 'required'
        ]);
        foreach ($request->moreFields as $k => $input) {
            $variant = Variant::create(['name' =>  $input['name'], 'prix' => $input['prix'], 'quantity' =>  $input['quantity'], 'couleur_id' => $request->couleur, 'taille_id' => $request->taille, 'produit_id' => $produit_id]);
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
            $produit_id = $produit->id;
            foreach ($request->moreFields as $key => $value) {
                if (filled($value['name']) || filled($value['prix']) || filled($value['quantity']) || filled($request->images)) {
                    $this->AjouterVariant($request, $produit_id);
                    return redirect('/admin/produit/' . $produit_id . '/variants')->with('ajout', 'Le Variant est ajoutée avec succés');
                } else {
                    return redirect('/admin/produits')->with('edit', 'Le Produit est ajouté avec succée');
                }
            }
        }
    }
    public function ModifierProduit(Request $request)
    {
        $produit = Produit::findOrFail($request->id);
        $produit->categorie_id = $request->categorie;
        $produit_id = $produit->id;
        if ($produit->update(Arr::except($request->all(), ['categorie', 'images[]']))) {
            foreach ($request->moreFields as $key => $value) {
                if (filled($value['name']) || filled($value['prix']) || filled($value['quantity']) || filled($request->images)) {
                    $this->AjouterVariant($request, $produit_id);
                    return redirect('/admin/produit/' . $produit_id . '/variants')->with('ajout', 'Le Variant est ajoutée avec succés');
                } else {
                    return redirect('/admin/produits')->with('edit', 'Le Produit est modifiée avec succés');
                }
            }
        }
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
    public function listeproduits(Request $request)
    {
        return view('admin.produit.listeproduits', ['categories' => Categorie::all(), 'produits' => Produit::with('category')->get()]);
    }
}
