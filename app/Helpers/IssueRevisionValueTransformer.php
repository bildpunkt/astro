<?php

namespace App\Helpers;

class IssueRevisionValueTransformer
{
    /**
     * Returns the proper value to be displayed in the changelist
     * Either the "name" property of a model or the value itself
     *
     * If the value is empty, it will return a localized "None" string
     *
     * @param $value
     *
     * @return string
     */
    public static function transform($value)
    {
        $result = !empty($value->name) ? $value->name : $value;

        if (empty($result)) {
            $result = __('none');
        }

        return $result;
    }
}
