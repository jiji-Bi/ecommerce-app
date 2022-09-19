<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;

    protected $table = "variants";
    protected $fillable = ['name', 'prix', 'quantity', 'couleur_id', 'taille_id', 'produit_id'];

    public function images()
    {
        return $this->hasMany(VariantImages::class, 'variant_id', 'id');
    }
    public function couleur()
    {
        return $this->belongsTo(Couleur::class, 'couleur_id', 'id');
    }
    public function taille()
    {
        return $this->belongsTo(Taille::class, 'taille_id', 'id');
    }
    public function produit()
    {
        return $this->belongsTo(Produit::class, 'produit_id', 'id');
    }
    //   query scope 
    public function scopefilter($query, array $filters) // Variant::newQuery()->filter()
    {
        // if (isset($filters['search'])) {
        //     $query
        //         ->where('title', 'like', '%' . request('search') . '%')
        //         ->orwhere('body', 'like', '%' . request('search') . '%')
        //         ->orwhere('excerpt', 'like', '%' . request('search') . '%');
        // }
        //--------------Null coalescing operator-------------------------------
        // $query->when($filters['search'] ?? false, function ($query, $search) {
        //     //dd(request(['search']), $search);
        //     $query->where(function ($query) use ($search) {
        //         $query
        //             ->where('title', 'like', '%' . $search . '%')
        //             ->orwhere('body', 'like', '%' . $search . '%')
        //             ->orwhere('excerpt', 'like', '%' . $search . '%');
        //     });
        // });

        $query->when(
            $filters['couleur'] ?? false,
            function ($query, $couleur) {
                $query
                    ->whereExists(
                        function ($query) use ($couleur) {
                            $query->from('couleur')
                                ->whereColumn('couleurs.id', 'variants.couleur_id')
                                //we specfiy the query keyword in the url 
                                ->where('couleurs.nom', $couleur);
                        }
                    );
            }
        );
    }
}
