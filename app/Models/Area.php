<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AquariumSpecies;

class Area extends Model
{
    protected $fillable = [
        'aquarium_id',
        'name',
        'description',
        'image_path',
    ];

    public function aquarium()
    {
        return $this->belongsTo(Aquarium::class);
    }

    public function species()
    {
    return $this->belongsToMany(
        AquariumSpecies::class,
        'area_species',
        'area_id',
        'aquarium_species_id'
    );
    }
}