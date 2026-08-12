<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}