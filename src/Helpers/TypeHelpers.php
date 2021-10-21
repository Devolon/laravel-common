<?php

namespace Devolon\Common\Helpers;

class TypeHelpers
{
    public static function isIntValue($value): bool
    {
        return is_string($value) && (string)intval($value) === (string)$value;
    }
}
