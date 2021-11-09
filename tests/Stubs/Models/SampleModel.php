<?php

namespace Devolon\Common\Tests\Stubs\Models;

use Devolon\Common\Traits\RepositoryRouteBinding;
use Illuminate\Database\Eloquent\Model;

class SampleModel extends Model
{
    use RepositoryRouteBinding;
}