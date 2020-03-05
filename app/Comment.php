<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * Get the bug assigned to the comment
     */
    public function bug()
    {
        return $this->belongsTo('App\Bug');
    }

    /**
     * Get the bug assigned to the comment
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'created_by_user_id', 'id');
    }
}
