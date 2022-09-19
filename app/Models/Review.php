<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = "reviews";
    protected $fillable = ['rating', 'review'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function produit()
    {
        return $this->belongsTo(Produit::class, 'produit_id', 'id');
    }
}
