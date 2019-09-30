<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{

    protected $fillable = ['name'];
    public function Spaces(){
        $this->belongsToMany('App\Space');
    }
}
