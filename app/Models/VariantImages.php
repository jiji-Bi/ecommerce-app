<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariantImages extends Model
{
    use HasFactory;
    protected $table = "images";
    protected $fillable = ['image'];

    public function variant()
    {
        return $this->belongsTo(Variant::class, 'variant_id', 'id');
    }

    public function scopefilter($query, array $filters) // VariantImages::newQuery()->filter()
    {
        $query->when(
            $filters['picture'] ?? false,
            function ($query, $picture) {
                $query
                    ->where('variant_id', $picture);
            }
        );
    }
}
