<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    //

    public function todos()
    {
        return $this->hasMany('App\Todo');
    }
}
