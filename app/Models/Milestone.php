<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    protected $fillable = ['name', 'description', 'project_id'];

    /**
     * Issues that are part of a milestone
     *
     * @return \Illuminate\Database\Eloquent\Collection<\App\Models\Issue>
     */
    public function issues()
    {
        return $this->hasMany('App\Models\Issue');
    }

    /**
     * Project the milestone belongs to
     *
     * @return \App\Models\Project
     */
    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }
}
