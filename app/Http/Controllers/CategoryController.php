<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function FormAddCategory()
    {
        return view('categorie.addform');
    }
    public function AjouterCategory(Request $request)
    {
        // dd($request);
        $request->validate(['nom' => 'required', 'description' => 'required']);
        $categorie = new Categorie();
        $categorie->nom = $request->nom;
        $categorie->description = $request->description;
        if ($categorie->save()) {
            return redirect('/categorie/list')->with('alerte', 'La catégorie est ajoutée avec succés');
        } else {
            return 'failed to add category';
        }
    }
    public function SupprimerCategory($id)
    {
        $categorie = Categorie::find($id);
        if ($categorie->delete()) {
            return redirect('/categorie/list')->with('alerte', 'La catégorie est supprimée avec succés');
        } else {
            return 'failed to delete category';
        }
    }
    public function ListerCategory()
    {
        return view('categorie.list', ['categories' => Categorie::all()]);
    }
}
