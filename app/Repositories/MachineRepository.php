<?php

namespace App\Repositories;

use App\Models\Machine;
use Illuminate\Database\Eloquent\Model;
use SaineshMamgain\LaravelRepositories\Exceptions\RepositoryException;
use SaineshMamgain\LaravelRepositories\Repositories\BaseRepository;

class MachineRepository extends BaseRepository
{

    /**
     * @var Machine $model
     */
    protected $model;

    public function __construct(Machine $model = null)
    {
        if (empty($model)) {
            $model = new Machine();
        } elseif (! $model instanceof Machine) {
            throw new RepositoryException(get_class($model) . ' is not an instance of Machine model');
        }
        parent::__construct($model);
    }

    /**
     * @return Machine|Model
     * @throws RepositoryException
     */
    public function create($fields)
    {
        return parent::create($fields);
    }

    /**
     * @return Machine[]|Model[]
     * @throws RepositoryException
     */
    public function createMany($rows)
    {
        return parent::createMany($rows);
    }

    /**
     * @return Machine|Model
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
     * @return Machine|Model
     */
    public function restore()
    {
        return parent::restore();
    }
}
