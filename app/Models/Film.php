<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Film extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['titre', 'annee', 'description'];

    public function category()
    {
        return $this->belongsToMany(Category::class);
    }

}
