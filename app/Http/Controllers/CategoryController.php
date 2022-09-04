<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function AjouterCategory(Request $request)
    {
        // dd($request);
        $request->validate(['nom' => 'required', 'description' => 'required']);
        $categorie = new Categorie();
        $categorie->nom = $request->nom;
        $categorie->description = $request->description;
        if ($categorie->save()) {
            return redirect()->back()->with('alerte', 'La catégorie est ajoutée avec succés');
        } else {
            return 'failed to add category';
        }
    }
    public function SupprimerCategory($id)
    {
        $categorie = Categorie::find($id);
        if ($categorie->delete()) {
            return redirect('/admin/categories')->with('alerte', 'La catégorie est supprimée avec succés');
        } else {
            return 'failed to delete category';
        }
    }
    public function ModifierCategory(Request $request)
    {
        $request->validate(['nom' => 'required', 'description' => 'required']);
        //$categorie = Categorie::find($request->id);
        // $categorie->nom = $request->nom;
        // $categorie->description = $request->description;
        $categorie = Categorie::findOrFail($request->id);
        if ($categorie->update($request->all())) {
            return redirect()->back()->with('alerte', 'La catégorie est modifiée avec succés');
        } else {
            return 'failed to edit category';
        }
    }
    public function index()
    {
        return view('admin.categorie.index', ['categories' => Categorie::all()]);
    }
}
