<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'description', 'url'];

    /**
     * Issues that are part of a project
     *
     * @return \Illuminate\Database\Eloquent\Collection<\App\Models\Issue>
     */
    public function issues()
    {
        return $this->hasMany('App\Models\Issue');
    }

    /**
     * Milestones that are part of a project
     *
     * @return \Illuminate\Database\Eloquent\Collection<\App\Models\Milestone>
     */
    public function milestones()
    {
        return $this->hasMany('App\Models\Milestone');
    }
}
