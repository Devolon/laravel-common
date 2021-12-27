<?php

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Swagger documentation for the boilerplate project",
 *      description="Implementation of Swagger with in Laravel",
 *      @OA\Contact(
 *          email="tpm@devolon.fi"
 *      ),
 *      @OA\License(
 *          name="Apache 2.0",
 *          url="https://www.apache.org/licenses/LICENSE-2.0.html"
 *      )
 * )
 *
 * @OA\Server(
 *      url="http://localhost:80",
 *      description="Local API Server"
 * )
 *
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     description="Token based authentication.",
 *     scheme="bearer",
 *     bearerFormat="JWT"
 * )
 */
