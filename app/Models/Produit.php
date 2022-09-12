<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $table = "produits";
    protected $fillable = ['nom', 'description', 'stock', 'price'];

    public function category()
    {
        return $this->belongsTo(Categorie::class);
    }
    public function images()
    {
        return $this->hasMany(ProductImages::class);
    }
    public function couleurs()
    {
        return $this->hasMany(Couleur::class);
    }
}
