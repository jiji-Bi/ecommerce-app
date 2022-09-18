<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use App\Models\Couleur;
use App\Models\Taille;
use App\Models\VariantImages;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;

class VariantController extends Controller
{
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

    public function SupprimerImage($variant)
    {
        $images = VariantImages::where('variant_id', $variant->id)->get();
        foreach ($images as $name) {;
            $path = public_path()  . '/uploads/' . $name->image;
            unlink($path);
        }
        VariantImages::where('variant_id', $variant->id)->delete();
    }

    public function SupprimerImageRecord(Request $request)
    { //find the image to remove 
        $variant_image = VariantImages::findOrFail($request->id);

        $path = public_path()  . '/uploads/' . $variant_image->image;
        unlink($path);

        if ($variant_image->delete()) {
            return  redirect()->back()->with('error_code', '5');
        } //Remove it from the product
    }

    public function SupprimerVariant(Request $request)
    {
        $variant = Variant::find($request->id);
        $this->SupprimerImage($variant);
        if ($variant->delete()) {
            return redirect()->back()->with('delete', 'Le variant est supprimée avec succés');
        } else {
            return 'failed to delete variant';
        }
    }
    public function ModifierVariant(Request $request)
    {
        $variant = Variant::findOrFail($request->variantid);
        $variant->taille_id = $request->taille;
        $variant->couleur_id = $request->couleur;
        if ($variant->update(Arr::except($request->all(), ['images[]', 'taille', 'couleur']))) {
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $imagefile) {
                    $variant->images()->create(['variant_id' => $variant->id, 'image' => $this->UploadImage($imagefile)]);
                }
            }
            return redirect()->back()->with('edit', 'Le Variant est modifiée avec succés');
        } else {
            return 'failed to edit variant';
        }
    }
    public function listevariants($id, Request $request)
    {
        $produit = Produit::findOrFail($id);
        // $couleur = Couleur::with('couleur')->where('couleur_id', $request->couleur_id);
        // $taille = Taille::with('taille')->where('taille_id', $request->taille_id);
        $variants = $produit->variants;
        return view('admin.variant.listevariants', ['couleurs' => Couleur::all(), 'tailles' => Taille::all(), 'variants' => $variants]);
    }
}
