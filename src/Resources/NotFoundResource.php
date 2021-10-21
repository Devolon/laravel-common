<?php

namespace Devolon\Common\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class NotFoundResponse
 *
 * @package Devolon\Common\Resources
 */
class NotFoundResource extends JsonResource
{
    public function withResponse($request, $response)
    {
        $response->setStatusCode(Response::HTTP_NOT_FOUND);

        parent::withResponse($request, $response);
    }
}
