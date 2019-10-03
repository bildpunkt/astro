<?php

namespace App\Models;

use App\Models\Milestone;
use App\Models\User;
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
        $attributes = json_decode($value, true);

        foreach ($attributes as $attribute => $values) {
            switch ($attribute) {
                case 'assigned_to_id':
                    $attributes['assignee'] = [
                        'old' => User::find($values['old']),
                        'new' => User::find($values['new'])
                    ];

                    unset($attributes['assigned_to_id']);
                    break;
                case 'milestone_id':
                    $attributes['milestone'] = [
                        'old' => Milestone::find($values['old']),
                        'new' => Milestone::find($values['new'])
                    ];

                    unset($attributes['milestone_id']);
                    break;
                default:
            }
        }

        return $attributes;
    }
}
