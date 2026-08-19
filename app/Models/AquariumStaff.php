<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AquariumStaff extends Model
{
    protected $table = 'aquarium_staffs';

    protected $fillable = [
        'aquarium_id',
        'user_id',
    ];

    public function aquarium()
    {
        return $this->belongsTo(Aquarium::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}