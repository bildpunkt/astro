<?php

namespace App\Helpers;

use App\Models\IssuePriority;
use App\Models\IssueType;
use App\Models\Milestone;
use App\Models\User;

class IssueRevisionAttributeTransformer
{
    /**
     * Mapping containing configuration on how fields should be transformed
     *
     * @var array
     */
    public static $transformMapping = [
        'subject' => [
            'method' => 'htmlspecialchars',
            'target' => 'subject'
        ],
        'description' => [
            'method' => 'htmlspecialchars',
            'target' => 'description'
        ],
        'assigned_to_id' => [
            'method' => User::class . '::find',
            'target' => 'assignee'
        ],
        'milestone_id' => [
            'method' => Milestone::class . '::find',
            'target' => 'milestone'
        ],
        'priority_id' => [
            'method' => IssuePriority::class . '::find',
            'target' => 'priority'
        ],
        'type_id' => [
            'method' => IssueType::class . '::find',
            'target' => 'type'
        ]
    ];

    /**
     * Transforms fields from an IssueRevision
     *
     * @param array
     *
     * @return array
     */
    public static function transform(array $attributes)
    {
        foreach ($attributes as $attribute => $values) {
            $config = self::$transformMapping[$attribute];

            $attributes[$config['target']] = [
                'old' => $config['method']($values['old']),
                'new' => $config['method']($values['new'])
            ];

            if ($attribute != $config['target']) {
                unset($attributes[$attribute]);
            }
        }

        return $attributes;
    }
}
