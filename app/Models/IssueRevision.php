<?php

namespace App\Models;

use App\Helpers\IssueRevisionAttributeTransformer;
use App\Helpers\IssueRevisionValueTransformer;
use App\Models\Issue;
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
        return $this->belongsTo(User::class);
    }

    /**
     * Issue this issue revision belongs to
     *
     * @return \App\Models\Issue
     */
    public function issue()
    {
        return $this->belongsTo(Issue::class);
    }

    /**
     * Get the revisions changed attributes
     *
     * @return array
     */
    public function getAttributesAttribute($value)
    {
        return IssueRevisionAttributeTransformer::transform(json_decode($value, true));
    }

    /**
     * Get a "Changed :attribute from :old to :new"-style string from
     * attribute keys and change arrays
     *
     * @param $key
     * @param $values
     *
     * @return string
     */
    public function change(string $key, array $values)
    {
        return __('issues.revision.change', [
            'attribute' => __("issues.attributes.{$key}"),
            'old' => IssueRevisionValueTransformer::transform($values['old']),
            'new' => IssueRevisionValueTransformer::transform($values['new'])
        ]);
    }
}
