<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneCommande extends Model
{
    use HasFactory;
    protected $table = "lignecommande";
    protected $fillable = ['quantity'];

    public function commande()
    {
        return $this->belongsTo(Commande::class, 'commande_id', 'id');
    }
    //ligne de commande a obligatoirement un et un seul produit 
    public function variant()
    {
        return $this->hasOne(Variant::class, 'variant_id', 'id');
    }
}
