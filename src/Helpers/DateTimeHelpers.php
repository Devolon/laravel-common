<?php

namespace Devolon\Common\Helpers;

use DateInterval;

class DateTimeHelpers
{
    public static function getDateIntervalToUnix(DateInterval $dateInterval): int
    {
        return now()->add($dateInterval)->getTimestamp();
    }
}
