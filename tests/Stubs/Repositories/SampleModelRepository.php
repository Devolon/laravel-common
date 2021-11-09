<?php

namespace Devolon\Common\Tests\Stubs\Repositories;

use Devolon\Common\Bases\Repository;
use Devolon\Common\Tests\Stubs\Models\SampleModel;

class SampleModelRepository extends Repository
{
    public function model()
    {
        return SampleModel::class;
    }
}