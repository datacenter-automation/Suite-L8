<?php

namespace App\Repositories;

use App\Models\MachineNoteAttachment;
use Illuminate\Database\Eloquent\Model;
use SaineshMamgain\LaravelRepositories\Exceptions\RepositoryException;
use SaineshMamgain\LaravelRepositories\Repositories\BaseRepository;

class MachineNoteAttachmentRepository extends BaseRepository
{

    /**
     * @var MachineNoteAttachment $model
     */
    protected $model;

    public function __construct(MachineNoteAttachment $model = null)
    {
        if (empty($model)) {
            $model = new MachineNoteAttachment();
        } elseif (! $model instanceof MachineNoteAttachment) {
            throw new RepositoryException(get_class($model) . ' is not an instance of MachineNoteAttachment model');
        }
        parent::__construct($model);
    }

    /**
     * @return MachineNoteAttachment|Model
     * @throws RepositoryException
     */
    public function create($fields)
    {
        return parent::create($fields);
    }

    /**
     * @return MachineNoteAttachment[]|Model[]
     * @throws RepositoryException
     */
    public function createMany($rows)
    {
        return parent::createMany($rows);
    }

    /**
     * @return MachineNoteAttachment|Model
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
     * @return MachineNoteAttachment|Model
     */
    public function restore()
    {
        return parent::restore();
    }
}
