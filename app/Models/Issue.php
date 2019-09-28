<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    public function author()
    {
        return $this->belongsTo('App/Models/User', 'author_id');
    }

    public function assignee()
    {
        return $this->belongsTo('App/Models/User', 'assigned_to_id');
    }

    public function project()
    {
        return $this->belongsTo('App/Models/Project');
    }
}
