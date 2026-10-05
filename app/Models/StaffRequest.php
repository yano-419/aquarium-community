<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffRequest extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'aquarium_name',
        'status',
    ];
}