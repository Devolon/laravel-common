<?php

namespace Devolon\Common\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class UnauthorizedResource
 *
 * @package Devolon\Common\Resources
 */
class UnauthorizedResource extends JsonResource
{
    public function withResponse($request, $response)
    {
        $response->setStatusCode(Response::HTTP_UNAUTHORIZED);

        parent::withResponse($request, $response);
    }
}
