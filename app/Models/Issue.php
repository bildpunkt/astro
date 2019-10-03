<?php

namespace App\Models;

use App\Events\IssueUpdating;
use App\Models\IssueRevision;
use App\Models\Milestone;
use App\Models\Project;
use App\Models\User;
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
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * User assigned to the issue
     *
     * @return \App\Models\User
     */
    public function assignee()
    {
        return $this->belongsTo(User::class, 'assigned_to_id');
    }

    /**
     * Milestone the issue belongs to
     *
     * @return \App\Models\Milestone
     */
    public function milestone()
    {
        return $this->belongsTo(Milestone::class);
    }

    /**
     * Project the issue belongs to
     *
     * @return \App\Models\Project
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Revisions that belong to this issue
     *
     * @return \Illuminate\Database\Eloquent\Collection<\App\Models\IssueRevision>
     */
    public function revisions()
    {
        return $this->hasMany(IssueRevision::class);
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
