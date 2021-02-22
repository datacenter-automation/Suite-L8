<?php

namespace App\Repositories;

use App\Models\LocationGroup;
use Illuminate\Database\Eloquent\Model;
use SaineshMamgain\LaravelRepositories\Exceptions\RepositoryException;
use SaineshMamgain\LaravelRepositories\Repositories\BaseRepository;

class LocationGroupRepository extends BaseRepository
{

    /**
     * @var LocationGroup $model
     */
    protected $model;

    public function __construct(LocationGroup $model = null)
    {
        if (empty($model)) {
            $model = new LocationGroup();
        } elseif (! $model instanceof LocationGroup) {
            throw new RepositoryException(get_class($model) . ' is not an instance of LocationGroup model');
        }
        parent::__construct($model);
    }

    /**
     * @return LocationGroup|Model
     * @throws RepositoryException
     */
    public function create($fields)
    {
        return parent::create($fields);
    }

    /**
     * @return LocationGroup[]|Model[]
     * @throws RepositoryException
     */
    public function createMany($rows)
    {
        return parent::createMany($rows);
    }

    /**
     * @return LocationGroup|Model
     */
    public function update($fields)
    {
        return parent::update($fields);
    }

    /**
     * @return bool|null
     */
    public function destroy($permanent = false)
    {
        return parent::destroy($permanent);
    }

    /**
     * @return LocationGroup|Model
     */
    public function restore()
    {
        return parent::restore();
    }
}
