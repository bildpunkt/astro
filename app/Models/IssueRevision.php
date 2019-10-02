<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IssueRevision extends Model
{
    protected $fillable = ['user_id', 'issue_id', 'attributes'];

    /**
     * User that initiated the issue revision
     *
     * @return \App\Models\User
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Issue this issue revision belongs to
     *
     * @return \App\Models\Issue
     */
    public function issue()
    {
        return $this->belongsTo('App\Models\Issue');
    }

    /**
     * Get the revisions changed attributes
     *
     * @return array
     */
    public function getAttributesAttribute($value)
    {
        return json_decode($value);
    }
}
