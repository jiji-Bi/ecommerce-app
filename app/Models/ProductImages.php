<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    use HasFactory;
    protected $table = "images";
    protected $fillable = ['produit_id', 'image'];

    public function product()
    {
        return $this->belongsTo(Produit::class);
    }
}
