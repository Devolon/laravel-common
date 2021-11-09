<?php

namespace Devolon\Common\Traits;

use Devolon\Common\Services\RepositoryRegistry;

trait RepositoryRouteBinding
{
    public function resolveRouteBinding($value, $field = null)
    {
        /** @var RepositoryRegistry $repositoryRegistry */
        $repositoryRegistry = app(RepositoryRegistry::class);
        $repository = $repositoryRegistry->getRepository(static::class);

        $field = $field ?? $this->getRouteKeyName();

        return $repository->findOneByCriteria([
            $field => $value,
        ]);
    }
}
