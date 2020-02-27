<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bug extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'created_by_user_id', 'title', 'assigned_to_user_id', 'category_id', 'status_id', 'priority_id', 'notify_creator', 'description'
    ];
}
