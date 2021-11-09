<?php

namespace Devolon\Common\Services;

use Devolon\Common\Bases\Repository;

class RepositoryRegistry
{
    /**
     * @var array<string, Repository>
     */
    private array $repositories = [];

    public function __construct(Repository ...$repositories)
    {
        foreach ($repositories as $repository) {
            $this->repositories[$repository->model()] = $repository;
        }
    }

    public function getRepository(string $modelClass): Repository
    {
        return $this->repositories[$modelClass];
    }
}
