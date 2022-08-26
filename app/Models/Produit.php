<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    public function AjouterCategory()
    {
        $category = new Categorie();
        $category->nom = "t-shirts";
        $category->description = "hi";
        $category->save();
        return 'created';
    }
}
