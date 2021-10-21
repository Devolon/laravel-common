<?php

namespace Devolon\Common\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ForbiddenResponse
 *
 * @package Devolon\Common\Virtuals
 */
class NoContentResource extends JsonResource
{
    public function __construct()
    {
        parent::__construct(null);
    }

    public function withResponse($request, $response)
    {
        $response->setStatusCode(Response::HTTP_NO_CONTENT);

        parent::withResponse($request, $response);
    }
}
