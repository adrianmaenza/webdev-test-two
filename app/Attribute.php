<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    public function users(){
        return $this->belongsToMany("\App\User");
    }
}
