<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    protected $fillable = ['name', 'description', 'project_id'];

    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }
}
