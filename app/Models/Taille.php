<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taille extends Model
{
    use HasFactory;
    protected $table = "tailles";
    protected $fillable = ['nom', 'code', 'status'];
    public function variants()
    {
        return $this->hasMany(Variant::class);
    }
}
