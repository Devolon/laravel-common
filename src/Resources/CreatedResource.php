<?php

namespace Devolon\Common\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CreatedResource
 *
 * @package Devolon\Common\Virtuals
 */
class CreatedResource extends JsonResource
{
    public function __construct()
    {
        parent::__construct(null);
    }

    public function withResponse($request, $response)
    {
        $response->setStatusCode(Response::HTTP_CREATED);

        parent::withResponse($request, $response);
    }
}
