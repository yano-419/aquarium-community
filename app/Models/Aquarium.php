<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
    
}
 
