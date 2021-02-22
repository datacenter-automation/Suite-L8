<?php

namespace App\Repositories;

use App\Models\MachineLog;
use Illuminate\Database\Eloquent\Model;
use SaineshMamgain\LaravelRepositories\Exceptions\RepositoryException;
use SaineshMamgain\LaravelRepositories\Repositories\BaseRepository;

class MachineLogRepository extends BaseRepository
{

    /**
     * @var MachineLog $model
     */
    protected $model;

    public function __construct(MachineLog $model = null)
    {
        if (empty($model)) {
            $model = new MachineLog();
        } elseif (! $model instanceof MachineLog) {
            throw new RepositoryException(get_class($model) . ' is not an instance of MachineLog model');
        }
        parent::__construct($model);
    }

    /**
     * @return MachineLog|Model
     * @throws RepositoryException
     */
    public function create($fields)
    {
        return parent::create($fields);
    }

    /**
     * @return MachineLog[]|Model[]
     * @throws RepositoryException
     */
    public function createMany($rows)
    {
        return parent::createMany($rows);
    }

    /**
     * @return MachineLog|Model
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
     * @return MachineLog|Model
     */
    public function restore()
    {
        return parent::restore();
    }
}
