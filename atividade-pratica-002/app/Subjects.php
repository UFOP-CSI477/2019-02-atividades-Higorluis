<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    // Subjec -> Request (1:N)
    public function requests(){
        return $this->hasMany('App\User');
    }
}