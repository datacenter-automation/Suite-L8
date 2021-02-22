<?php

namespace App\Repositories;

use App\Models\Software;
use Illuminate\Database\Eloquent\Model;
use SaineshMamgain\LaravelRepositories\Exceptions\RepositoryException;
use SaineshMamgain\LaravelRepositories\Repositories\BaseRepository;

class SoftwareRepository extends BaseRepository
{

    /**
     * @var Software $model
     */
    protected $model;

    public function __construct(Software $model = null)
    {
        if (empty($model)) {
            $model = new Software();
        } elseif (! $model instanceof Software) {
            throw new RepositoryException(get_class($model) . ' is not an instance of Software model');
        }
        parent::__construct($model);
    }

    /**
     * @return Software|Model
     * @throws RepositoryException
     */
    public function create($fields)
    {
        return parent::create($fields);
    }

    /**
     * @return Software[]|Model[]
     * @throws RepositoryException
     */
    public function createMany($rows)
    {
        return parent::createMany($rows);
    }

    /**
     * @return Software|Model
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
     * @return Software|Model
     */
    public function restore()
    {
        return parent::restore();
    }
}
