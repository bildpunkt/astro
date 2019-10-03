<?php

namespace App\Models;

use App\Models\Issue;
use App\Models\Milestone;
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
        return $this->hasMany(Issue::class);
    }

    /**
     * Milestones that are part of a project
     *
     * @return \Illuminate\Database\Eloquent\Collection<\App\Models\Milestone>
     */
    public function milestones()
    {
        return $this->hasMany(Milestone::class);
    }
}
