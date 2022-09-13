<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariantImages extends Model
{
    use HasFactory;
    protected $table = "images";
    protected $fillable = ['variant_id', 'image'];
    public function variant()
    {
        return $this->belongsTo(Variant::class);
    }
}
