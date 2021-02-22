<?php

namespace App\Repositories;

use App\Models\MachineType;
use Illuminate\Database\Eloquent\Model;
use SaineshMamgain\LaravelRepositories\Exceptions\RepositoryException;
use SaineshMamgain\LaravelRepositories\Repositories\BaseRepository;

class MachineTypeRepository extends BaseRepository
{

    /**
     * @var MachineType $model
     */
    protected $model;

    public function __construct(MachineType $model = null)
    {
        if (empty($model)) {
            $model = new MachineType();
        } elseif (! $model instanceof MachineType) {
            throw new RepositoryException(get_class($model) . ' is not an instance of MachineType model');
        }
        parent::__construct($model);
    }

    /**
     * @return MachineType|Model
     * @throws RepositoryException
     */
    public function create($fields)
    {
        return parent::create($fields);
    }

    /**
     * @return MachineType[]|Model[]
     * @throws RepositoryException
     */
    public function createMany($rows)
    {
        return parent::createMany($rows);
    }

    /**
     * @return MachineType|Model
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
     * @return MachineType|Model
     */
    public function restore()
    {
        return parent::restore();
    }
}
