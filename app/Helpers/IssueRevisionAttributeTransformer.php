<?php

namespace App\Helpers;

use App\Models\Milestone;
use App\Models\User;

class IssueRevisionAttributeTransformer
{
    /**
     * Transforms *_id fields from an IssueRevision to model representations
     *
     * @param array
     *
     * @return array
     */
    public static function transform(array $attributes)
    {
        foreach ($attributes as $attribute => $values) {
            switch ($attribute) {
                case 'subject':
                case 'description':
                    $attributes[$attribute] = [
                        'old' => htmlspecialchars($values['old']),
                        'new' => htmlspecialchars($values['new'])
                    ];

                    break;
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
