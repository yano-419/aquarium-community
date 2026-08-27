<?php

namespace App\Models;

use App\Models\AquariumSpecies;
use Illuminate\Database\Eloquent\Model;
use App\Models\Species;

class Aquarium extends Model
{
    protected $table = 'aquariums';

     protected $fillable = [
    'name',
    'prefecture',
    'address',
    'description',
    'image_path',
    'official_url',
    ];
    
    public function species()
    {
        return $this->belongsToMany(Species::class);
    }

    public function areas()
    {
    return $this->hasMany(Area::class);
    }

    public function aquariumStaffs()
    {
    return $this->hasMany(
        AquariumStaff::class
    );
    }

    public function aquariumSpecies()
    {
    return $this->hasMany(
        AquariumSpecies::class
    );
    }

}



