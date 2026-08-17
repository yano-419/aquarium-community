<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
            Species::class,
            'area_species'
        );
    }
}