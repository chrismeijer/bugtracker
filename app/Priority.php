<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    /**
     * Get all of the bugs model
     */
    public function bugs()
    {
        return $this->hasMany('App\Bug');
    }
}
