<?php

namespace Devolon\Common\Bases;

use Devolon\Common\Exception\RepositoryException;
use Devolon\Common\Tools\Setting;
use Illuminate\Container\Container;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class BaseRepository
 * @package App\Repositories
 * @template T
 */
abstract class Repository implements EloquentRepositoryInterface
{
    protected array $fillable = [];

    /**
     * @var Container
     */
    private Container $container;

    /**
     * BaseRepository constructor.
     *
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * This method will fill the given $object by the given $array.
     * If the $fillable parameter is not available it will use the fillable
     * array of the class.
     *
     * @param array $data
     * @param Model $object
     * @param array $fillable
     * @return mixed
     */
    public function fill(array $data, $object, array $fillable = [])
    {
        if (empty($fillable)) {
            $fillable = $this->fillable;
        }

        if (!empty($fillable)) {
            // just fill when fillable array is not empty
            $object->fillable($fillable)->fill($data);
        }

        return $object;
    }

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    abstract public function model();

    public function all($columns = ['*'])
    {
        return $this->query()->get($columns);
    }

    public function paginate($perPage = Setting::PAGE_SIZE, $columns = ['*'])
    {
        return $this->query()->paginate($perPage, $columns);
    }

    public function create(array $data, array $fillable = [])
    {
        $object = $this->fill($data, $this->makeModel(), $fillable);
        $object->save();

        return $object;
    }

    public function initialize(array $data, array $fillable = [])
    {
        return $this->fill($data, $this->makeModel(), $fillable);
    }

    public function update(array $data, $object, array $fillable = [])
    {
        if (!($object instanceof Model)) {
            $object = $this->find($object);
        }

        $object = $this->fill($data, $object, $fillable);
        $object->save();

        return $object;
    }

    public function delete($object)
    {
        if (is_numeric($object)) {
            $object = $this->find($object)->first();
        }

        return $object->delete();
    }

    public function save(Model $object): bool
    {
        return $object->save();
    }

    public function find(int $id, $columns = ['*'])
    {
        return $this->query()->find($id, $columns);
    }

    public function findOrFail(int $id, $columns = ['*'])
    {
        return $this->query()->findOrFail($id, $columns);
    }

    public function findBy($attribute, $value, $columns = ['*'])
    {
        return $this->query()->where($attribute, '=', $value)->first($columns);
    }

    public function findByWithDescOrder($attribute, $value, $orderBy, $columns = ['*'])
    {
        return $this->query()->where($attribute, '=', $value)->orderByDesc($orderBy)->first($columns);
    }

    /**
     * @return Builder
     * @throws BindingResolutionException
     * @throws RepositoryException
     */
    public function query()
    {
        return $this->makeModel()->newQuery();
    }

    /**
     * Make model
     *
     * @return Model
     * @throws RepositoryException
     * @throws BindingResolutionException
     */
    public function makeModel()
    {
        $model = $this->container->make($this->model());

        if (!$model instanceof Model) {
            throw new RepositoryException(
                "Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model",
            );
        }

        return $model;
    }

    /**
     * Updates one or many records by given criteria
     *
     * @param array $criteria
     * @param array $data
     * @return int
     * @throws BindingResolutionException
     * @throws RepositoryException
     */
    public function updateByCriteria(array $criteria, array $data): int
    {
        return $this->query()
            ->where($criteria)
            ->update($data);
    }

    public function loadRelations(Model $model, array $relations = []): Model
    {
        return $model->load($relations);
    }

    public function updateOrCreate(array $attributes, array $values = [])
    {
        return tap($this->query()->firstOrNew($attributes), function ($instance) use ($values) {
            $instance->fill($values)->save();
        });
    }

    /**
     * @return ?T
     */
    public function findOneByCriteria(array $criteria, $columns = ['*']): ?Model
    {
        return $this->query()->where($criteria)->first($columns);
    }

    public function exists(array $criteria): bool
    {
        return $this->query()
            ->where($criteria)
            ->exists();
    }

    public function deleteBy(array $criteria): void
    {
        $this->query()
            ->where($criteria)
            ->delete();
    }

    public function paginateWithRelations(
        int $perPage,
        array $relations = [],
        array $criteria = [],
        string $orderDirection = 'desc',
        string $order = 'id',
        array $columns = ['*']
    ): LengthAwarePaginator {
        return $this->query()
            ->where($criteria)
            ->with($relations)
            ->orderBy($order, $orderDirection)
            ->paginate($perPage, $columns);
    }
}
