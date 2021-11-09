<?php

namespace Devolon\Common\Tests;

use Devolon\Common\Bases\Repository;
use Devolon\Common\Services\RepositoryRegistry;
use Devolon\Common\Tests\LaravelCommonTestCase;
use Devolon\Common\Tests\Stubs\Models\SampleModel;
use Devolon\Common\Tests\Stubs\Repositories\SampleModelRepository;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery\MockInterface;

class RepositoryRegistryTest extends LaravelCommonTestCase
{
    use WithFaker;

    public function testGetRepository()
    {
        // Arrange
        $repository = $this->resolveAndTagRepository();
        $service = $this->resolveService();

        // Act
        $result = $service->getRepository(SampleModel::class);

        // Assert
        $this->assertEquals($repository, $result);
    }

    private function resolveAndTagRepository(): SampleModelRepository
    {
        $this->app->tag(SampleModelRepository::class, [Repository::class]);

        return resolve(SampleModelRepository::class);
    }

    private function resolveService(): RepositoryRegistry
    {
        return resolve(RepositoryRegistry::class);
    }
}