<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table = "variants";
    protected $fillable = ['nom', 'color_id', 'size_id', 'stock', 'price'];

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
}
