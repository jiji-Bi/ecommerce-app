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
        return $this->belongsTo(Categorie::class, 'categorie_id', 'id');
    }
    public function variants()
    {
        return $this->hasMany(Variant::class, 'produit_id', 'id');
    }
    public function reviews()
    {
        return $this->hasMany(Review::class, 'produit_id', 'id');
    }
}
