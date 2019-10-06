<?php

namespace App\Models;

use App\Events\IssueUpdating;
use App\Models\IssuePriority;
use App\Models\IssueRevision;
use App\Models\IssueType;
use App\Models\Milestone;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $fillable = [
        'subject',
        'description',
        'assigned_to_id',
        'author_id',
        'project_id',
        'milestone_id',
        'priority_id',
        'type_id'
    ];

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
     * Priority of this issue
     *
     * @return \App\Models\IssuePriority
     */
    public function priority()
    {
        return $this->hasOne(IssuePriority::class, 'id', 'priority_id');
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
     * Type of this issue
     *
     * @return \App\Models\IssueType
     */
    public function type()
    {
        return $this->hasOne(IssueType::class, 'id', 'type_id');
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
