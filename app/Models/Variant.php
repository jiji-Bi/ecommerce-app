<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;

    protected $table = "variants";
    protected $fillable = ['nom', 'price', 'quantity', 'couleur_id', 'taille_id', 'produit_id'];

    public function images()
    {
        return $this->hasMany(VariantImages::class);
    }
    public function couleur()
    {
        return $this->belongsTo(Couleur::class);
    }
    public function taille()
    {
        return $this->belongsTo(Taille::class);
    }
    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
}
