<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $fillable = ['subject', 'description', 'assigned_to_id', 'author_id', 'project_id'];

    public function author()
    {
        return $this->belongsTo('App\Models\User', 'author_id');
    }

    public function assignee()
    {
        return $this->belongsTo('App\Models\User', 'assigned_to_id');
    }

    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }
}
