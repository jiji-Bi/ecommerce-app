<?php

namespace App\Http\Controllers;

use App\Models\Taille;
use Illuminate\Http\Request;

class TailleController extends Controller
{


    public function AjouterTaille(Request $request)
    {
        // dd($request);
        $request->validate(['nom' => 'required', 'status' => 'required']);
        $couleur = new Taille();
        $couleur->nom = $request->nom;
        $couleur->code = $request->code;
        $couleur->status = $request->status;
        if ($couleur->save()) {
            return redirect()->back()->with('ajout', 'La Taille est ajoutée avec succés');
        } else {
            return 'failed to add couleur';
        }
    }
    public function SupprimerTaille($id)
    {
        $couleur = Taille::find($id);
        if ($couleur->delete()) {
            return redirect('/admin/tailles')->with('delete', 'La Taille est supprimée avec succés');
        } else {
            return 'failed to delete taille';
        }
    }
    public function ModifierTaille(Request $request)
    {
        $request->validate(['nom' => 'required', 'status' => 'required']);
        $couleur = Taille::findOrFail($request->id);
        if ($couleur->update($request->all())) {
            return redirect()->back()->with('edit', 'La Taille est modifiée avec succés');
        } else {
            return 'failed to edit taille';
        }
    }
    public function listetailles()
    {
        $tailles = Taille::all();
        return view('admin.tailles.index', ['tailles' => $tailles]);
    }
}
