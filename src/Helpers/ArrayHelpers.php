<?php

namespace Devolon\Common\Helpers;

class ArrayHelpers
{
    public static function arrayKeysExist(array $keys, array $array)
    {
        return !array_diff_key(array_flip($keys), $array);
    }
}
