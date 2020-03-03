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

    /**
     * Get the user which created the bug
     */
    public function createdByUser()
    {
        return $this->belongsTo('App\User', 'created_by_user_id');
    }

    /**
     * Get the user assigned to the bug
     */
    public function assignedUser()
    {
        return $this->belongsTo('App\User', 'assigned_to_user_id');
    }

    /**
     * Get the category assigned to the bug
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * Get the priority assigned to the bug
     */
    public function priority()
    {
        return $this->belongsTo('App\Priority');
    }

    /**
     * Get the resolution assigned to the bug
     */
    public function resolution()
    {
        return $this->belongsTo('App\Resolution');
    }

    /**
     * Get the status assigned to the bug
     */
    public function status()
    {
        return $this->belongsTo('App\Status');
    }
}
