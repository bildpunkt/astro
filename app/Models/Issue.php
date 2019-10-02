<?php

namespace App\Models;

use App\Events\IssueUpdating;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $fillable = ['subject', 'description', 'assigned_to_id', 'author_id', 'project_id', 'milestone_id'];

    /**
     * Author of the issue
     *
     * @return \App\Models\User
     */
    public function author()
    {
        return $this->belongsTo('App\Models\User', 'author_id');
    }

    /**
     * User assigned to the issue
     *
     * @return \App\Models\User
     */
    public function assignee()
    {
        return $this->belongsTo('App\Models\User', 'assigned_to_id');
    }

    /**
     * Milestone the issue belongs to
     *
     * @return \App\Models\Milestone
     */
    public function milestone()
    {
        return $this->belongsTo('App\Models\Milestone');
    }

    /**
     * Project the issue belongs to
     *
     * @return \App\Models\Project
     */
    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }

    /**
     * Revisions that belong to this issue
     *
     * @return \Illuminate\Database\Eloquent\Collection<\App\Models\IssueRevision>
     */
    public function revisions()
    {
        return $this->hasMany('App\Models\IssueRevision');
    }

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'updating' => IssueUpdating::class
    ];
}
