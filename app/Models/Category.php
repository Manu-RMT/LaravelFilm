<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $visible = ['name']; // POUR AFFICHER LE NOOM DANS L'API
    public function films()
    {
        return $this->belongsToMany(Film::class);
    }
}
