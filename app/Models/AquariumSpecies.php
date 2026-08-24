<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AquariumSpecies extends Model
{
    protected $table = 'aquarium_species';

    protected $fillable = [
        'aquarium_id',
        'species_id',
        'description',
        'image_path',
    ];

    public function species()
    {
        return $this->belongsTo(
            Species::class
        );
    }

    public function aquarium()
    {
        return $this->belongsTo(
            Aquarium::class
        );
    }
}