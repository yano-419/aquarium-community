<?php

namespace App\Models;

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
}



