<?php

/**
 * @OA\Schema (
 *     schema="Pagination",
 *     @OA\Property(
 *         property="links",
 *         type="object",
 *         @OA\Property(property="first", type="string", readOnly=true, description="link to the first page"),
 *         @OA\Property(property="last", type="string", readOnly=true, description="link to the last page"),
 *         @OA\Property(property="prev", type="string", readOnly=true, description="link to the previous page"),
 *         @OA\Property(property="next", type="string", readOnly=true, description="link to the next page"),
 *     ),
 *     @OA\Property(
 *         property="meta",
 *         type="object",
 *         @OA\Property(property="current_page", type="integer", readOnly=true, description="current page number."),
 *         @OA\Property(property="from", type="integer", readOnly=true, description="from index."),
 *         @OA\Property(property="last_page", type="integer", readOnly=true, description="number of last page."),
 *         @OA\Property(property="path", type="string", readOnly=true, description="path of current page."),
 *         @OA\Property(property="per_page", type="integer", readOnly=true, description="number of items per page."),
 *         @OA\Property(property="to", type="integer", readOnly=true, description="to index."),
 *         @OA\Property(property="total", type="integer", readOnly=true, description="number of items in total."),
 *     )
 * )
 */