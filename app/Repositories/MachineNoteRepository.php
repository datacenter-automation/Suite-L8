<?php

namespace App\Repositories;

use App\Models\MachineNote;
use Illuminate\Database\Eloquent\Model;
use SaineshMamgain\LaravelRepositories\Exceptions\RepositoryException;
use SaineshMamgain\LaravelRepositories\Repositories\BaseRepository;

class MachineNoteRepository extends BaseRepository
{

    /**
     * @var MachineNote $model
     */
    protected $model;

    public function __construct(MachineNote $model = null)
    {
        if (empty($model)) {
            $model = new MachineNote();
        } elseif (! $model instanceof MachineNote) {
            throw new RepositoryException(get_class($model) . ' is not an instance of MachineNote model');
        }
        parent::__construct($model);
    }

    /**
     * @return MachineNote|Model
     * @throws RepositoryException
     */
    public function create($fields)
    {
        return parent::create($fields);
    }

    /**
     * @return MachineNote[]|Model[]
     * @throws RepositoryException
     */
    public function createMany($rows)
    {
        return parent::createMany($rows);
    }

    /**
     * @return MachineNote|Model
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
     * @return MachineNote|Model
     */
    public function restore()
    {
        return parent::restore();
    }
}
