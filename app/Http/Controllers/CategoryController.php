<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function AjouterCategory()
    {
        $category = new Categorie();
        $category->nom = "t-shirts";
        $category->description = "hi";
        $category->save();
    }
    public function index()
    {
        return view('formulaire');
    }
}
