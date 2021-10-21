<?php

namespace Devolon\Common\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ForbiddenResource
 *
 * @package Devolon\Common\Resources
 */
class ForbiddenResource extends JsonResource
{
    public function withResponse($request, $response)
    {
        $response->setStatusCode(Response::HTTP_FORBIDDEN);

        parent::withResponse($request, $response);
    }
}
