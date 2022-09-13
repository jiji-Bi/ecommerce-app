<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Couleur;
use App\Models\VariantImages;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;

class VariantController extends Controller
{


    public function index()
    {
        return view('admin.produit.index', ['categories' => Categorie::all(), 'produits' => Variant::all(), 'couleurs' => Couleur::where('status', '0')->get()]);
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

    public function SupprimerImageRecord(int $image_id)
    { //find the image to remove 
        $variant_image = VariantImages::findOrFail($image_id);
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
            return redirect('/admin/variants')->with('delete', 'Le variant est supprimée avec succés');
        } else {
            return 'failed to delete variant';
        }
    }
    public function ModifierVariant(Request $request)
    {
        $variant = Variant::findOrFail($request->id);

        //edit 
        if ($variant->update(Arr::except($request->all(), ['images']))) {
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $imagefile) {

                    $variant->images()->create(['variant_id' => $variant->id, 'image' => $this->UploadImage($imagefile)]);;
                }
            }
            return redirect()->back()->with('edit', 'Le Variant est modifiée avec succés');
        } else {
            return 'failed to edit variant';
        }
    }
    public function listevariants()
    {
        return view('admin.variant.listevariants', ['variants' => Variant::all()]);
    }
}