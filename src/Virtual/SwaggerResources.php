<?php

/**
 * @OA\Response (
 *     response="ForbiddenResponse",
 *     description="Forbidden, this actions is unauthorized.",
 *     @OA\JsonContent(
 *         required={"message"},
 *         @OA\Property(property="message", type="string", description="exception description"),
 *     )
 * )
 */

/**
 * @OA\Response (
 *     response="NoContentResponse",
 *     description="Success, no need to navigate away.",
 *     @OA\JsonContent(
 *         required={"message"},
 *         @OA\Property(property="message", type="string", description="exception description"),
 *     )
 * )
 */

/**
 * @OA\Response (
 *     response="NotFoundResponse",
 *     description="The entity is not found.",
 *     @OA\JsonContent(
 *         required={"message"},
 *         @OA\Property(property="message", type="string", description="exception description"),
 *     )
 * )
 */

/**
 * @OA\Response (
 *     response="UnauthorizedResponse",
 *     description="Unauthorized, the user is unauthenticated.",
 *     @OA\JsonContent(
 *         required={"message"},
 *         @OA\Property(property="message", type="string", description="exception description"),
 *     )
 * )
 */

 /**
 * @OA\Response (
 *     response="CreatedResponse",
 *     description="Success, resource created.",
 *     @OA\JsonContent(
 *         required={"message"},
 *         @OA\Property(property="message", type="string", description="exception description"),
 *     )
 * )
 */
