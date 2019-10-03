<?php

namespace App\Models;

use App\Models\Issue;
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
        'name', 'email', 'password', 'admin',
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
        'admin' => 'boolean',
        'email_verified_at' => 'datetime'
    ];

    /**
     * Returns if the user is admin
     *
     * @return boolean
     */
    public function isAdmin()
    {
        return $this->admin;
    }

    /**
     * Issues a user created
     *
     * @return \Illuminate\Database\Eloquent\Collection<\App\Models\Issue>
     */
    public function issues()
    {
        return $this->hasMany(Issue::class);
    }
}
