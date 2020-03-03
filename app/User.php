<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the role associated with the user
     */
    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    /**
     * Get the bugs created by the user
    */
    public function bugsCreated()
    {
        return $this->hasMany('App\Bug', 'created_by_user_id');
    }

    /**
     * Get the bugs assigned to the user
    */
    public function bugsAssigned()
    {
        return $this->hasMany('App\Bug', 'assigned_to_user_id');
    }
}
