<?php

namespace App\Http\Controllers;

use App\Models\Couleur;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        return view('admin.couleurs.index', ['couleurs' => Couleur::all()]);
    }
    public function listecouleurs()
    {
        $couleurs = Couleur::all();
        return view('admin.couleurs.index', ['couleurs' => $couleurs]);
    }
    public function AjouterCouleur(Request $request)
    {
        // dd($request);
        $request->validate(['nom' => 'required', 'status' => 'required']);
        $couleur = new Couleur();
        $couleur->nom = $request->nom;
        $couleur->code = $request->code;
        $couleur->status = $request->status;
        if ($couleur->save()) {
            return redirect()->back()->with('add', 'La couleur est ajoutée avec succés');
        } else {
            return 'failed to add couleur';
        }
    }
    public function SupprimerCouleur($id)
    {
        $couleur = Couleur::find($id);
        if ($couleur->delete()) {
            return redirect('/admin/couleurs')->with('alerte', 'La couleur est supprimée avec succés');
        } else {
            return 'failed to delete couleur';
        }
    }
    public function ModifierCouleur(Request $request)
    {
        $request->validate(['nom' => 'required', 'status' => 'required']);
        $couleur = Couleur::findOrFail($request->id);
        if ($couleur->update($request->all())) {
            return redirect()->back()->with('alerte', 'La couleur est modifiée avec succés');
        } else {
            return 'failed to edit couleur';
        }
    }
}
