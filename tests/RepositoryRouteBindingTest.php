<?php

namespace Devolon\Common\Tests;

use Devolon\Common\Bases\Repository;
use Devolon\Common\Services\RepositoryRegistry;
use Devolon\Common\Tests\Stubs\Models\SampleModel;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery\MockInterface;

class RepositoryRouteBindingTest extends LaravelCommonTestCase
{
    use WithFaker;

    /**
     * @dataProvider provideData
     */
    public function testResolveRouteBinding(
        ?string $field,
        string $expectedField,
        int $value,
        ?SampleModel $fetchedModel
    ) {
        // Arrange
        $sampleModel = new SampleModel();
        $repositoryRegistry = $this->mockRepositoryRegistry();
        $repository = $this->mockedRepository();

        // Expect
        $repositoryRegistry
            ->shouldReceive('getRepository')
            ->with(SampleModel::class)
            ->andReturn($repository);

        $repository
            ->shouldReceive('findOneByCriteria')
            ->with([$expectedField => $value])
            ->andReturn($fetchedModel);

        // Act
        $result = $sampleModel->resolveRouteBinding($value, $field);

        // Assert
        $this->assertEquals($fetchedModel, $result);
    }

    public function provideData(): array
    {
        $faker = $this->makeFaker('en_US');

        return [
            'with null field has no result' => [null, 'id', $faker->randomNumber(), null],
            'with null field has result' => [null, 'id', $faker->randomNumber(), new SampleModel()],
            'with non-null field has no result' => [$field = $faker->word, $field, $faker->randomNumber(), null],
        ];
    }

    private function mockRepositoryRegistry(): MockInterface
    {
        return $this->mock(RepositoryRegistry::class);
    }

    private function mockedRepository(): MockInterface
    {
        return $this->mock(Repository::class);
    }
}