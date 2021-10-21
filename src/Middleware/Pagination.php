<?php

namespace Devolon\Common\Middleware;

use Devolon\Common\Tools\Setting;
use Closure;
use Illuminate\Http\Request;

class Pagination
{
    protected const MAX_PER_PAGE = 100;

    public function handle(Request $request, Closure $next)
    {
        $perPage = $request->get('perPage');

        if (
            empty($perPage) ||
            is_array($perPage) ||
            is_object($perPage) ||
            intval($perPage) <= 0 ||
            intval($perPage) > static::MAX_PER_PAGE
        ) {
            $perPage = Setting::PAGE_SIZE;
        }

        $request->query->set('perPage', (int) $perPage);

        return $next($request);
    }
}
