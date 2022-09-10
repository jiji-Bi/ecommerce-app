<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
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

    public function SupprimerImage($produit)
    {
        $images = ProductImages::where('produit_id', $produit->id)->get();
        foreach ($images as $name) {;
            $path = public_path()  . '/uploads/' . $name->image;
            unlink($path);
        }
        ProductImages::where('produit_id', $produit->id)->delete();
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
    public function SupprimerImageRecord(int $image_id)
    { //find the image to remove 
        $produit_image = ProductImages::findOrFail($image_id);
        $path = public_path()  . '/uploads/' . $produit_image->image;
        unlink($path);

        if ($produit_image->delete()) {
            return  redirect()->back()->with('error_code', '5');
        } //Remove it from the product
    }

    public function SupprimerProduit(Request $request)
    {
        $produit = Produit::find($request->id);
        $this->SupprimerImage($produit);
        if ($produit->delete()) {
            return redirect('/admin/produits')->with('delete', 'Le Produit est supprimée avec succés');
        } else {
            return 'failed to delete category';
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
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $imagefile) {

                    $produit->images()->create(['produit_id' => $produit->id, 'image' => $this->UploadImage($imagefile)]);
                }
            }
        }
        return redirect('/admin/produits')->with('ajout', 'Le Produit est ajoutée avec succés');
    }
    public function ModifierProduit(Request $request)
    {
        $produit = Produit::findOrFail($request->id);

        //edit 
        if ($produit->update(Arr::except($request->all(), ['images']))) {
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $imagefile) {

                    $produit->images()->create(['produit_id' => $produit->id, 'image' => $this->UploadImage($imagefile)]);;
                }
            }
            return redirect()->back()->with('edit', 'Le Produit est modifiée avec succés');
        } else {
            return 'failed to edit produit';
        }
    }
    public function listeproduits()
    {
        return view('admin.produit.listeproduits', ['categories' => Categorie::all(), 'produits' => Produit::all()]);
    }
}
