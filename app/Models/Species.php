<?php

namespace App\Models;

use App\Models\AquariumSpecies;
use Illuminate\Database\Eloquent\Model;
use App\Models\Aquarium;

class Species extends Model
{
   protected $fillable = [
    'name',
    'classification',
    'scientific_name',
    'order_name',
    'family_name',
    'description',
    'image_path',
    ];

     public function aquariumSpecies()
    {
    return $this->hasMany(
        AquariumSpecies::class
    );
    }

    public function aquariums()
    {
        return $this->belongsToMany(Aquarium::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

}

