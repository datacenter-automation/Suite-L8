<?php

namespace App\Repositories;

use App\Models\Location;
use Illuminate\Database\Eloquent\Model;
use SaineshMamgain\LaravelRepositories\Exceptions\RepositoryException;
use SaineshMamgain\LaravelRepositories\Repositories\BaseRepository;

class LocationRepository extends BaseRepository
{

    /**
     * @var Location $model
     */
    protected $model;

    public function __construct(Location $model = null)
    {
        if (empty($model)) {
            $model = new Location();
        } elseif (! $model instanceof Location) {
            throw new RepositoryException(get_class($model) . ' is not an instance of Location model');
        }
        parent::__construct($model);
    }

    /**
     * @return Location|Model
     * @throws RepositoryException
     */
    public function create($fields)
    {
        return parent::create($fields);
    }

    /**
     * @return Location[]|Model[]
     * @throws RepositoryException
     */
    public function createMany($rows)
    {
        return parent::createMany($rows);
    }

    /**
     * @return Location|Model
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
     * @return Location|Model
     */
    public function restore()
    {
        return parent::restore();
    }
}
